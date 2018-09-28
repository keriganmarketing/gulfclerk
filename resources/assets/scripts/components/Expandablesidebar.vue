<template>
    <div>
        <div class="list-group list-group-flush">
            <div v-for="page in pages" :key="page.id">
                <a 
                    :href="page.link" 
                    class="list-group-item list-group-item-action"
                    :class="{'active':page.id == post.ID}"
                    v-html="page.title.rendered"
                ></a>
                <div v-if="page.children.length > 0" v-for="child in page.children" :key="child.id" >
                    <a 
                        :href="child.link" 
                        class="list-group-item list-group-item-action child-page"
                        :class="{'active':child.id == post.ID}"
                    >
                    <i class="fa fa-angle-up"></i> {{child.title.rendered}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['post'],

    data() {
        return {
            pages: [],
        }
    },

    created() {
        this.getSiblingPages();
    },

    methods: {
        getPages() {
            http.get("/wp-json/wp/v2/pages?orderby=menu_order&order=asc")
                .then(response => {
                    this.pages = response.data; 
                });
        },

        getChildPages() {
            http.get("/wp-json/wp/v2/pages?parent=" + this.post.ID + "&orderby=menu_order&order=asc")
                .then(response => {
                    this.pages = response.data; 


                });
        },

        getSiblingPages() {
            http.get("/wp-json/wp/v2/pages?parent=" + this.post.post_parent + "&orderby=menu_order&order=asc")
                .then(response => {
                    let data = response.data;

                    Object.keys(data).map((key) => {
                        
                        data[key].children = [];
                        http.get("/wp-json/wp/v2/pages?parent=" + data[key].id + "&orderby=menu_order&order=asc")
                            .then(response => {
                                data[key].children = response.data; 
                            });
                    })

                    this.pages = data; 
                
                });
        },

        getSubPages() {
            Object.keys(this.pages).map((key) => {
                
                this.pages[key].children = [];
                http.get("/wp-json/wp/v2/pages?parent=" + this.pages[key].id + "&orderby=menu_order&order=asc")
                    .then(response => {
                        console.log(response.data);
                        this.pages[key].children = response.data; 
                    });
            })
        }
    }
}
</script>

