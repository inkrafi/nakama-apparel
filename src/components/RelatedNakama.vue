<template>
    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Produk lain yang terkait</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/baju-1.jpg" alt="" />
                            <!-- <ul>
                                <li class="w-icon active">
                                    <a href="#"><i class="icon_bag_alt"></i></a>
                                </li>
                                <li class="quick-view">
                                    <router-link v-bind:to="'/product/'+6">Lihat Produk</router-link>
                                </li>
                            </ul> -->
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Kaos</div>
                            <a href="#">
                                <h5>Trafalgar D. Water Law</h5>
                            </a>
                            <div class="product-price">
                                Rp. 90.000
                                <span>Rp. 120.000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/baju-2.jpg" alt="" />
                            <!-- <ul>
                                <li class="w-icon active">
                                    <a href="#"><i class="icon_bag_alt"></i></a>
                                </li>
                                <li class="quick-view"><router-link to="/product">+ Quick View</router-link></li>
                            </ul> -->
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Kaos</div>
                            <a href="#">
                                <h5>Kaido</h5>
                            </a>
                            <div class="product-price">
                                Rp. 99.000
                                <span>Rp. 120.000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/baju-3.jpg" alt="" />
                            <!-- <ul>
                                <li class="w-icon active">
                                    <a href="#"><i class="icon_bag_alt"></i></a>
                                </li>
                                <li class="quick-view"><router-link v-bind:to="'/product/'+idProduct">+ Quick View</router-link></li>
                            </ul> -->
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Kaos</div>
                            <a href="#">
                                <h5>Roronoa Zoro</h5>
                            </a>
                            <div class="product-price">
                                Rp. 95.000
                                <span>Rp. 120.000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/baju-4.jpg" alt="" />
                            <!-- <ul>
                                <li class="w-icon active">
                                    <a href="#"><i class="icon_bag_alt"></i></a>
                                </li>
                                <li class="quick-view"><router-link to="/product">+ Quick View</router-link></li>
                            </ul> -->
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Kaos</div>
                            <a href="#">
                                <h5>Vinsmoke Sanji</h5>
                            </a>
                            <div class="product-price">
                                Rp. 80.000
                                <span>Rp. 120.000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->
</template>

<script>
import axios from "axios";

export default {
    name: 'RelatedNakama',
}
</script>

<style scoped>
.product-item .pi-pic {
    border-top-left-radius: 3%;
    border-top-right-radius: 3%;
}
</style>