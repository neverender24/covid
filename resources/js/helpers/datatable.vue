<template>
    <div class="ui segment">
        <div :class="loading ? 'ui active inverted dimmer' : ''">
            <div class="ui loader"></div>
        </div>
        <table class="ui very compact selectable table">
            <thead>
                <tr>
                    <th
                        v-for="column in columns"
                        :key="column.name"
                        @click="$emit('sort', column.name)"
                        :class="sortKey === column.name ? (sortOrders[column.name] > 0 ? 'sorting_asc' : 'sorting_desc') : 'sorting'"
                        :style="'width:'+column.width+'; cursor:pointer;'"
                    >{{ column.label}}</th>
                </tr>
            </thead>
            <slot></slot>
        </table>
    </div>
</template>

<style>
</style>

<script>
export default {
    props: ["columns", "sortKey", "sortOrders", "loading"]
};
</script>