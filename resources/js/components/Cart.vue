<script>
    import axios from 'axios';    
    
    export default{

        props:{
            items: Array
        },
    
        data(){
            return{
                ItemsArray: [],
                ciao: 'ciao',

                disabledArray: [],
            }
        },


        methods:{
            pushItemId(item){
            
                this.ItemsArray.push({
                    id: item.id,
                    name: item.name,
                    qty: 1,
                })


                this.disabledArray.push({
                    id: item.id,
                })


                //console.log(this.ItemsArray)
            },


            removeItem(index, elementsRemoved){
                this.ItemsArray.splice(index, elementsRemoved)
    
            },


            disable(id){
                this.disabledArray.forEach(element => {

                    if(this.disabledArray.includes(id)){
                        return 'disabled'
                    }

                });
            }
        }
    }

</script>


<template>
    <div class="container">
        <h1 class="text-center">
            Inventory Cart {{ ciao }}
        </h1>

        <table class="table">            
            <thead>
                <tr>
                    <th scope="col"><h2>Item</h2></th>
                    <th scope="col"><h2>Qty</h2></th>
                    <th scope="col"><h2>Remove</h2></th> 
                </tr>
            </thead>
            <tbody>                
                <tr class="mb3" v-for="(item, i) in ItemsArray">                    
                    <td class="me-3">{{ item.name }}</td>
                    <td class="me-3">
                        <input type="hidden" :value="item.id" :name="`item[${i}][id]`">
                        <input class="cart-quantity-input" type="number" :value="item.qty" :name="`item[${i}][qty]`" id="qty" style="width: 50px">
                    </td>
                    <td class="me-3">
                        <h3 @click="removeItem(i, 1)" class="btn btn-danger">Remove</h3>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="container">
        <div class="row gap-1 justify-content-center">
            <div v-for="(item, i) in items" class="col-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title shop-item-title">{{item.name}}</h5>
                        <button @click="pushItemId(item)" type="button" :data-item-id="item.id" class="w-100 btn btn-success mt-auto shop-item-button"><i class="fa-solid fa-cart-shopping "></i>Add To Inventory</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
