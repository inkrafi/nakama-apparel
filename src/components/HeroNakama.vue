<template>
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items">

            <div class="single-hero-items set-bg" style="background-image: url('/img/carousel-1.jpg')">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-6 text-title">
                            <!-- <span>Bag,kids</span> -->
                            <h1>Nakama Apparel</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            </p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
</template>

<script>
export default {
    name: 'HeroNakama',
    setup() {
        const carouselSlides = ["carousel-1", "carousel-2", "carousel-3"]

        return {carouselSlides};
    }
}
</script>

<style scoped>
.hero-section {
    margin-top: 150px;
}
.text-title {
    margin-top: 60px;
}
.text-title h1,p {
    color: #fff;
}
.primary-btn {
    background: #d8973c;
}
.primary-btn:hover {
    transition: 0.2s;
    background: #bd632f;
}

.single-hero-items {
    background-size: cover;
}
.single-hero-items::after {
    content: "";
    display: block;
    width: 100%;
    height: 100%;
    background-image: linear-gradient(to top, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));
    position: absolute;
    bottom: 0;
    left: 0;
}
.single-hero-items .text-title {
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.4);
    z-index: 1;
    position: relative;
}
</style>