<template>
<h1 class="flex justify-center text-xl">API-D</h1>
    <div class="grid grid-cols-3 gap-8 justify-around ">
        <Product
            :key="product.id"
            :title="product.title"
            :image="product.image"
            v-for="product in products"
        />
    </div>
</template>

<script>
export default {
    components: {
        Product
    },
    data(){
        return{
            products: null,
        }
    },
    props: {data: JSON},
    created(){
        axios.get('https://epood.ta19heinsoo.itmajakas.ee/api/hajus')
            .then(response => this.products = response.data)
        }
}
import axios from 'axios'
import Product from '../Components/Product.vue';

var products;

</script>
