<template>
    <!-- Women Banner Section Begin -->
    <section>
        

        <div class="container">
            <div class="row justify-content-around">
                <div class="col-md-4 mt-5" v-if="products.length > 0">
                        <div class="product-item" v-for="itemProduct in products" v-bind:key="itemProduct.id">
                            <div class="pi-pic bottom-space">
                                <img v-bind:src="itemProduct.galleries[0].photo" alt="" />
                                <ul>
                                    <li @click="saveKeranjang(itemProduct.id, itemProduct.name, itemProduct.price, itemProduct.galleries[0].photo), pemesanan()" class="w-icon active">
                                        <a href="#">
                                            <i class="icon_bag_alt"></i>
                                        </a>
                                    </li>
                                    <li class="quick-view"><router-link v-bind:to="'/product/'+itemProduct.id">Lihat Produk</router-link></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{ itemProduct.type }}</div>
                                <a href="#">
                                    <h5>{{ itemProduct.name }}</h5>
                                </a>
                                <div class="product-price">
                                    Rp. {{ itemProduct.price }}
                                    <span>Rp.120.000</span>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- <div class="col-md-4 mt-5">
                    <p>Halo</p>
                </div> -->

                <div class="col-lg-12" v-else>
                    <p>
                        Produk terbaru belum tersedia saat ini.
                    </p>
                </div>   
                
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->
</template>

<script>
import axios from "axios";

export default {
    name: 'BajuNakama',
    data() {
        return {
            products: [],
            keranjangUser: [],
            pesan: []
        };
    },
    mounted() {
        axios
            .get("http://127.0.0.1:8000/api/products")
            .then(res => (this.products = res.data.data.data))
            .catch(err => console.log(err));

        if (localStorage.getItem("keranjangUser")) {
            try {
                this.keranjangUser = JSON.parse(localStorage.getItem("keranjangUser"));
            } catch (e) {
                localStorage.removeItem("keranjangUser");
            }
        }
    },
    methods: {
        saveKeranjang(idProduct, nameProduct, priceProduct, photoProduct) {

          var productStored = {
            "id": idProduct,
            "name": nameProduct,
            "price": priceProduct,
            "photo": photoProduct
          }

          this.keranjangUser.push(productStored);
          const parsed = JSON.stringify(this.keranjangUser);
          localStorage.setItem("keranjangUser", parsed);

          window.location.reload();
        },
        pemesanan() {
            if(this.pesan.productStored) {
            this.pesan.keranjangUser = this.products
            axios
            .post("http://127.0.0.1:8000/api/checkout", this.pesan)
            .then(() => {
                this.$toast.success('Menambahkan ke keranjang', {
                type: 'success',
                position: 'bottom-right',
                duration: 3000,
                dismissible: true
                });
            })
            .catch(err => console.log(err));
            } else {
                this.$toast.success('Berhasil menambahkan ke keranjang', {
                    type: 'success',
                    position: 'top-right',
                    duration: 3000,
                    dismissible: true
                    });
            }
        }
    }
}
</script>

<style scoped>
section {
    background: #d8c99b8f;
}
.product-item .pi-pic {
    border-top-left-radius: 5%;
    border-top-right-radius: 5%;
}
.product-item .pi-pic:hover {
    transition: 0.3s;
    box-shadow: 4px 3px 10px -1px rgba(66,80,107,0.46);
    -webkit-box-shadow: 4px 3px 13px -1px rgba(66,80,107,0.46);
    -moz-box-shadow: 4px 3px 13px -10px rgba(66,80,107,0.46);
}
.product-item .pi-text {
    margin-bottom: 100px;
}
.product-item .pi-text .product-price {
    color: #bd632f;
}
</style>