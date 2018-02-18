new Vue({
    el: '#crud',
    created: function(){
      this.getItems();
    },
    data: {
        items:[],
        modal:{
            title:'',
        },
        item:{},
        errors:[]
    },
    methods:{
        getItems: function(){
            var urlItems = 'tareas';
            axios.get(urlItems).then(response => {
                this.items = response.data
            });
        },

        deleteItem: function(item){
            var url = 'tareas/' + item.id;
            axios.delete(url).then(response =>{
               this.getItems(); //listamos
                toastr.success('"Eliminado Correctamente"');//Mensaje
            });
        },
        createItem: function(){
          var url = 'tareas';
          axios.post(url, {
              item: this.item.newItem,
          }).then(response => {
              this.getItems();
              this.item.newItem ='';
              this.errors = [];
              $('#create').modal('hide');
              toastr.success('"Tarea creada Correctamente"');
          }).catch(error => {
              this.errors = error.response.data
            });
        },
        formReset: function(){
            this.item ={
                id:'',
                newItem:'',
            }
        }
    },
    beforeMount(){
        this.formReset();
    },
    mounted(){
        var app = this;
        $("#create").on("hidden.bs.modal", function () {
            app.formReset();
        });
        $("#create").on("show.bs.modal", function () {
            app.modal.title = (app.item.id != ''?'Edición de ':'Nueva ') + 'Tarea';
        });
    }
});