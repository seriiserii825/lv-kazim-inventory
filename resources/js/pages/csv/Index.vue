<template>
  <admin-layout>
    <div class="sale">
      <el-button type="success" @click="downloadCSVData"
        >Download Csv</el-button
      >
    </div>
  </admin-layout>
</template>
<script>
import AdminLayout from "../../layouts/AdminLayout.vue";
import AdminBlock from "../../components/Admin/AdminBlock.vue";
import AdminProducts from "../../components/Admin/AdminProducts.vue";
import AdminCustomer from "../../components/Admin/AdminCustomer";

export default {
  data() {
    return {
      csv_items: [],
    };
  },
  methods: {
    handleClick(tab, event) {
      // console.log(tab, event);
    },
    getCsv() {
      axios
        .get("/api/auth/csv?api_token=" + this.$store.getters.getToken)
        .then((res) => {
          this.csv_items = res.data;
          const tipo = [{ 0: "Ruote in ferro" }, { 1: "Ruote Flex" }];
          const tipologia = [
            { 0: "Ruote piane" },
            { 1: "Ruote bombate" },
            { 2: "Ruote con cresta" },
            { 3: "Ruote con fascia di rinforzo" },
            { 4: "Ruote con perno montato" },
            { 5: "Ruote speciali a disegno" },
            { 50: "Cerchio in ferro" },
            { 51: "Cerchio in plastica" },
            { 52: "Cerchio metà in ferro metà in plastica" },
            { 53: "Cerchio con raggi" },
            { 54: "Monoblocco" },
            { 55: "Ruote speciali a disegno" },
          ];
          const diametro = [
            { 1: 145 },
            { 2: 190 },
            { 7: 250 },
            { 4: 280 },
            { 5: 300 },
            { 6: 500 },
            { 3: 320 },
            { 8: 360 },
            { 9: 400 },
            { 10: 230 },
            { 15: 165 },
            { 28: 580 },
            { 29: 248 },
            { 16: 200 },
            { 17: 220 },
            { 18: 600 },
            { 19: 185 },
            { 27: 385 },
            { 21: 318 },
            { 22: 325 },
            { 23: 330 },
            { 24: 370 },
            { 25: 410 },
            { 26: 450 },
          ];
          const larghezza = [
            { 1: 65 },
            { 2: 80 },
            { 3: 100 },
            { 4: 60 },
            { 5: 120 },
            { 6: 150 },
            { 7: 225 },
            { 8: 185 },
            { 13: 215 },
            { 9: 140 },
            { 12: 145 },
            { 11: 135 },
            { 10: 165 },
            { 14: 230 },
            { 15: 125 },
            { 16: 70 },
            { 17: 30 },
            { 18: 67 },
            { 19: 170 },
            { 20: 25 },
            { 21: 42 },
            { 22: 50 },
            { 23: 33 },
            { 24: 115 },
            { 25: 23 },
            { 26: 90 },
            { 27: 95 },
          ];

          // this.csv_items = this.csv_items.map(item => {
          //     const elem = {[item.id_misura]: item.misura_l};
          //     return elem;
          // });

          this.csv_items.forEach((item, index) => {
            item.title = this.setupProductTitle(item);
            item.diametro_id = this.getValueFromObject(
              item.diametro_id,
              item,
              diametro
            );
            item.larghezza_id = this.getValueFromObject(
              item.larghezza_id,
              item,
              larghezza
            );
            item.tipo = this.getValueFromObject(item.tipo, item, tipo);
            item.tipologia = this.getValueFromObject(
              item.tipologia,
              item,
              tipologia
            );
          });
          console.log(this.csv_items, "this.csv_items");
          //   this.csv_items.forEach((item, index) => {
          //     if (index < 3) {
          //       console.log(item.diametro_id, "item.diametro_id");
          //       console.log(item.larghezza_id, "item.larghezza_id");
          //       console.log(item.tipo, "item.tipo");
          //       console.log(item.tipologia, "item.tipologia");
          //     }
          //   });
        })
        .catch((error) => {
          console.log(error, "error");
        });
    },
    getValueFromObject(property, item, idsArray) {
      const result = idsArray.find((x) => property in x);
      return result[property];
    },
    setupProductTitle(item) {
      let title =
        "{:it}" +
        item.desc1 +
        "{:}{:en}" +
        item.desc2 +
        "{:}{:fr}" +
        item.desc3 +
        "{:}{:de}" +
        item.desc4 +
        "{:}{:ru}" +
        item.desc6 +
        "{:}\n";
      delete item["desc1"];
      delete item["desc2"];
      delete item["desc3"];
      delete item["desc4"];
      delete item["desc5"];
      delete item["desc6"];
      return title;
    },
    downloadCSVData() {
      // let csv = 'id,title,\n'; //diametro
      // let csv = 'id,title,\n'; //diametro
      // let csv = 'id,codice,diametro,larghezza_id,tipo,tipologia,mozzo,it,en,fr,de,esp,ru,img_1,img_2,img_3\n'; //prodotti
      // let csv = 'id,codice,diametro,larghezza_id,tipo,tipologia,mozzo,title,img_1,img_2,img_3\n'; //prodotti
      let csv =
        "id,codice,diametro,larghezza_id,tipo,tipologia,mozzo,img_1,img_2,img_3,title,\n"; //prodotti
      this.csv_items.forEach((row, index) => {
        // if (index < 2) {
        let values = Object.values(row);
        // values = values.filter(Boolean);
        csv += values.join(",");
        csv += "\n";
        // }
      });

      const anchor = document.createElement("a");
      anchor.href = "data:text/csv;charset=utf-8," + encodeURIComponent(csv);
      anchor.target = "_blank";
      anchor.download = "prodotti.csv";
      anchor.click();
    },
  },
  created() {
    this.getCsv();
  },
  components: {
    AdminLayout,
    AdminCustomer,
    AdminBlock,
    AdminProducts,
  },
};
</script>
