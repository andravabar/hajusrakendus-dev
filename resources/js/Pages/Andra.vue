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
        axios.get('https://epood.ta20vabar.itmajakas.ee/api/Products')
            .then(response => this.products = response.data)
        }
}
import axios from 'axios'
import Product from '../Components/ProductAndra.vue';

var products;

</script>
