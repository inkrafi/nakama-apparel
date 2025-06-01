<template>
  <div class="shopping">
    <HeaderNakama />

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-left">
            <div class="breadcrumb-text product-more">
              <router-link to="/">
                <i class="fa fa-home"></i> Home
              </router-link>
              <span>Keranjang</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12">
                <div class="cart-table">
                  <table>
                    <thead>
                      <tr>
                        <th>Foto</th>
                        <th class="p-name text-center">Produk</th>
                        <th>Harga</th>
                        <th>Hapus</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr v-for="keranjang in keranjangUser" :key="keranjang.id">
                        <td class="cart-pic first-row">
                          <img class="img-cart" :src="keranjang.photo" />
                        </td>
                        <td class="cart-title first-row text-center">
                          <h5>{{ keranjang.name }}</h5>
                        </td>
                        <td class="p-price first-row">Rp. {{ keranjang.price }}</td>
                        <td @click="removeItem(keranjangUser.index)" class="delete-item">
                          <a href="#">
                            <i class="material-icons">close</i>
                          </a>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="user-checkout text-left">
                <h4 class="mb-4 text-left">Informasi Pembeli:</h4>
                <p>Harap isi data dengan benar!</p>
                  <form v-on:submit.prevent>
                    <div class="form-group">
                      <label for="namaLengkap">Nama lengkap</label>
                      <input
                        type="text"
                        class="form-control"
                        id="namaLengkap"
                        aria-describedby="namaHelp"
                        placeholder="Masukan Nama"
                        v-model="customerInfo.name"
                        required
                      />
                    </div>
                    <div class="form-group">
                      <label for="namaLengkap">Email</label>
                      <input
                        type="email"
                        class="form-control"
                        id="emailAddress"
                        aria-describedby="emailHelp"
                        placeholder="Masukan Email"
                        v-model="customerInfo.email"
                        required
                      />
                    </div>
                    <div class="form-group">
                      <label for="namaLengkap">No. HP</label>
                      <input
                        type="text"
                        class="form-control"
                        id="noHP"
                        aria-describedby="noHPHelp"
                        placeholder="Masukan Nomor HP"
                        v-model="customerInfo.number"
                        required
                      />
                    </div>
                    <div class="form-group">
                      <label for="alamatLengkap">Alamat Lengkap</label>
                      <textarea class="form-control" id="alamatLengkap" rows="3" v-model="customerInfo.address" required></textarea>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <div class="proceed-checkout text-left">
                  <ul>
                    <!-- <li class="subtotal">
                      ID Transaction
                      <span>#SH12000</span>
                    </li> -->
                    <li class="subtotal mt-3">
                      Total Biaya
                      <span>Rp. {{ totalHarga }}</span>
                    </li>
                    <!-- <li class="subtotal mt-3">
                      Pajak
                      <span>10%</span>
                    </li>
                    <li class="subtotal mt-3">
                      Total Biaya
                      <span>Rp.{{ totalHarga*10/100 + totalHarga }}00</span>
                    </li> -->
                    <li class="subtotal mt-3">
                      Bank Transfer
                      <span>Mandiri</span>
                    </li>
                    <li class="subtotal mt-3">
                      No. Rekening
                      <span>2208 1996 1403</span>
                    </li>
                    <li class="subtotal mt-3">
                      Nama Penerima
                      <span>Nakama</span>
                    </li>
                  </ul>
                  <!-- <router-link to="/success"> -->
                    <a @click="checkout()" href="#" class="proceed-btn">pesan sekarang</a>
                  <!-- </router-link> -->
                  <br>
                  <p>*Catatan penting: Isi semua data terlebih dahulu, jika sudah silakan lakukan pembayaran ke no rekening yang tertera.<br>Jika sudah silakan klik "PESAN SEKARANG"</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Shopping Cart Section End -->
    <FooterNakama />
  </div>
</template>

<script>
import HeaderNakama from "@/components/HeaderNakama.vue";
import FooterNakama from "@/components/FooterNakama.vue";
// import func from 'vue-editor-bridge';
import axios from "axios"

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: 'cart',
  components: {
      HeaderNakama,
      FooterNakama
  },
  data() {
    return {
      keranjangUser: [],
      customerInfo: {
        name: '',
        email: '',
        number: '',
        address: ''
      },
    };
  },
  methods: {
    removeItem(index) {
      this.keranjangUser.splice(index, 1);
      const parsed = JSON.stringify(this.keranjangUser);
      localStorage.setItem('keranjangUser', parsed);

      window.location.reload();
    },
    // fungsi mengirim data ke API
    checkout() {
      let productIds = this.keranjangUser.map(function(product){
        return product.id
      });

      let checkoutData = {
        "name": this.customerInfo.name,
        "email": this.customerInfo.email,
        "number": this.customerInfo.number,
        "address": this.customerInfo.address,
        "transaction_total": this.totalHarga,
        "transaction_status": "PENDING",
        "transaction_details": productIds
      };

      axios
      .post("http://127.0.0.1:8000/api/checkout", checkoutData)
      .then(() => this.$router.push("success"))
      .catch(err => console.log(err));
    }
  },
  mounted() {
    if (localStorage.getItem("keranjangUser")) {
      try {
        this.keranjangUser = JSON.parse(localStorage.getItem("keranjangUser"));
      } catch (e) {
        localStorage.removeItem("keranjangUser");
      }
    }
  },
  computed: {
    totalHarga() {
      return this.keranjangUser.reduce(function(items, data){
        return items + data.price;
      }, 0);
    }
  }
};
</script>

<style scoped>
.img-cart {
  width: 100px;
  height: 150px;
}
.shopping {
    background-color: #d8c99b8f;
    margin-top: 150px;
}
.cart-table {
  background-color: #fff;
}
.user-checkout {
  background-color: #fff;
  padding: 30px;
  border-radius: 5px;
  margin-bottom: 100px;
}
</style>