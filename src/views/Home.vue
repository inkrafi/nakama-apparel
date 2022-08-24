<template>
  <div class="home">
    <HeaderNakama />
    <HeroNakama />
    <BajuNakama />
    <InstaNakama />
    <FooterNakama />
  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'
import HeaderNakama from "@/components/HeaderNakama.vue";
import HeroNakama from "@/components/HeroNakama.vue";
import BajuNakama from "@/components/BajuNakama.vue";
import InstaNakama from "@/components/InstaNakama.vue";
import FooterNakama from "@/components/FooterNakama.vue";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "home",
  components: {
    HeaderNakama,
    HeroNakama,
    BajuNakama,
    InstaNakama,
    FooterNakama
  }
}
</script>
