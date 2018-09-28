<template>
    <div @mouseleave="$emit('mousedout')">
        <ul class="mega-menu">
            <li v-for="navitem in mainNav" v-bind:key="navitem.ID" class="nav-item" :class="{'dropdown': navitem.children.length > 0 }">
                <a :href="navitem.url" :class="'nav-link ' + navitem.classes" :target="navitem.target" >{{ navitem.title }}</a>
                <ul class="dropdown-menu" v-if="navitem.children.length > 0" >
                    <li v-for="(child, i) in navitem.children" v-bind:key="i">
                        <a :href="child.url" :class="'dropdown-item ' + child.classes">{{ child.title }}</a>
                        <div class="dropdown-submenu" v-if="child.children.length > 0" >
                            <div v-for="(c, i) in child.children" v-bind:key="i" class="submenu-link">
                                <a :href="c.url" :class="'dropdown-item ' + c.classes">{{ c.title }}</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {

        props: {
            mainNav: {}
        }

    }
</script>
<style lang="scss" >
    .main-navigation .dropdown:hover .dropdown-menu {
        display: flex;
    }
</style>