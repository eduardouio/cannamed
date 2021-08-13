const appVue = {
  data() {
    return {
      active_client: false,
      active_doctor: false,
      show_form: false,
      other_customer: false,
      other_doctor: false,
      show_other_customer: false,
      show_other_doctor: false,
    };
  },
  methods: {
    setForm: function (type_client) {
      if (type_client === "customer") {
        this.active_client = true;
        this.active_doctor = false;
        return 0;
      }

      if (type_client === "doctor") {
        this.active_client = false;
        this.active_doctor = true;
        return 0;
      }
    },
    checkCustomer: function(){
        console.log('Llamada a otro de Cliente');
        console.dir(this.other_customer);
        if (this.other_customer === "otro") {
          this.show_other_customer = true;
          this.show_other_doctor = false;
        }
    },
    checkDoctor: function(){
        if(this.other_doctor === 'otro'){
            this.show_other_doctor = true;
            this.show_other_customer = false;
        }
    },
  },
  properties:{

    
  },
};

Vue.createApp(appVue).mount("#main");
