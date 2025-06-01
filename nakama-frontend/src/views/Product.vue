<template>
  <div class="product">
    <HeaderNakama />

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more text-left">
                       <router-link to="/"><i class="fa fa-home"></i> Home</router-link>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" :src="gambar_default" alt="" />
                            </div>
                            <!-- <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="img/mickey1.jpg">
                                        <img src="img/mickey1.jpg" alt="" />
                                    </div>

                                    <div class="pt" data-imgbigurl="img/mickey2.jpg">
                                        <img src="img/mickey2.jpg" alt="" />
                                    </div>

                                    <div class="pt" data-imgbigurl="img/mickey3.jpg">
                                        <img src="img/mickey3.jpg" alt="" />
                                    </div>

                                    <div class="pt" data-imgbigurl="img/mickey4.jpg">
                                        <img src="img/mickey4.jpg" alt="" />
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details text-left">
                                <div class="pd-title">
                                    <span>{{ productDetails.type }}</span>
                                    <h3>{{ productDetails.name }}</h3>
                                </div>
                                <div class="pd-desc">
                                    <p v-html="productDetails.description"></p>
                                    <h4>Rp. {{ productDetails.price }}</h4>
                                </div>
                                <div class="quantity">
                                    <router-link to="/cart"> 
                                      <a @click="saveKeranjang(productDetails.id, productDetails.name, productDetails.price, productDetails.galleries[0].photo)" href="#" class="primary-btn pd-cart">Masukkan Keranjang</a>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <RelatedNakama />
    <FooterNakama />
  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'
import axios from "axios";

import HeaderNakama from "@/components/HeaderNakama.vue";
import RelatedNakama from "@/components/RelatedNakama.vue";
import FooterNakama from "@/components/FooterNakama.vue";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "product",
  components: {
    HeaderNakama,
    RelatedNakama,
    FooterNakama
  },
  data() {
      return {
          gambar_default: "",
          productDetails: [],
          keranjangUser: []
      }
  },
  methods: {
      setDataPicture(data) {
          // replace object productDetails dengan data dari API
          this.productDetails = data;
          // replace value gambar_default dengan data dari API (galleries)
          this.gambar_default = data.galleries[0].photo;
      },
      saveKeranjang(idProduct, nameProduct, priceProduct, photoProduct) {

          var productStored = {
            "id": idProduct,
            "name": nameProduct,
            "price": priceProduct,
            "photo": photoProduct
          }

          this.keranjangUser.push(productStored);
          const parsed = JSON.stringify(this.keranjangUser);
          localStorage.setItem('keranjangUser', parsed);
      }
  },
  mounted() {
      if (localStorage.getItem('keranjangUser')) {
          try {
            this.keranjangUser = JSON.parse(localStorage.getItem('keranjangUser'));
          } catch(e) {
            localStorage.removeItem('keranjangUser');
          }
        }

        axios
            .get("http://127.0.0.1:8000/api/products", {
                params: {
                    id: this.$route.params.id
                }
            })
            .then(res => (this.setDataPicture(res.data.data)))
            .catch(err => console.log(err));
  }
}
</script>

<style scoped>
.product {
    background-color: #d8c99b8f;
    margin-top: 150px;
}
.pd-cart {
    background-color: #d8973c;
}
.pd-cart:hover {
    background-color: #bd632f;
}
.pd-desc h4 {
    color: #bd632f;
}
.product-big-img {
    border-radius: 10px;
}
</style>
