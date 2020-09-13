<template>
    <div>
        <div class="tile">
            <h3 class="tile-title">Product Attributes</h3>
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr class="text-center">
                            <th>Value</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="pa in productAttributes" :key="pa.id">
                            <td style="width: 25%" class="text-center">{{ pa.value }}</td>
                            <td style="width: 25%" class="text-center">{{ pa.quantity }}</td>
                            <td style="width: 25%" class="text-center">{{ pa.price }}</td>
                            <td style="width: 25%" class="text-center">
                                <button class="btn btn-sm btn-danger" @click="deleteProductAttribute(pa)">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        name: "product-attributes",
        props: ['productid'],
        data() {
            return {
                productAttributes: [],
            }
        },
        created: function() {
            this.loadProductAttributes(this.productid);
        },
        methods: {
            loadProductAttributes(id) {
                let _this = this;
                axios.post('/admin/products/attributes', {
                    id: id
                }).then (function(response){
                    _this.productAttributes = response.data;
                    console.log(response.data);
                }).catch(function (error) {
                    console.log(error);
                });
            },
        }
    }
</script>