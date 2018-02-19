new Vue({
    el: '#crud',
    created: function(){
      this.getItems();
    },
    data: {
        items:[],
        pagination:{
            'total':0,
            'current_page':0,
            'per_page':0,
            'last_page':0,
            'from':0,
            'to':0
        },
        modal:{
            title:'',
        },
        item:{},
        itemEdicion: {},
        errors:[],
        offset: 3
    },
    computed:{
      isActived: function () {
          return this.pagination.current_page
      },
      pagesNumber: function () {
          if(!this.pagination.to)
              return [];

          var from = this.pagination.current_page - this.offset;

          if (from < 1){
              from = 1;
          }

          var to = from + (this.offset * 2);

          if (to >= this.pagination.last_page){
              to = this.pagination.last_page;
          }

          var pagesArray = [];
          while(from <= to){
              pagesArray.push(from);
              from++;
          }
          return pagesArray;
      }
    },
    methods:{
        getItems: function(page){
            var urlItems = 'tareas?page='+page;
            axios.get(urlItems).then(response => {
                this.items = response.data.tareas.data,
                this.pagination = response.data.pagination
            });
        },

        editItem: function(item){
            this.itemEdicion.id = item.id;
            this.itemEdicion.item = item.item;
        },

        updateItem: function(id) {
          var url = 'tareas/'+ id;

          axios.put(url, this.itemEdicion).then(response => {
            this.getItems();
            this.itemEdicion = {};
            this.errors = [];
            $('#edit').modal('hide');
            toastr.success('Tarea actualizada con éxito!');
          }).catch(error => {
            this.errors = error.response.data
            // this.errors = 'Corrija para poder editar con éxito'
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
            };

            this.itemEdicion = {
                id:'',
                item:'',
            }
        },

        changePage : function (page) {
            this.pagination.current_page = page;
            this.getItems(page);
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
        $("#edit").on("show.bs.modal", function () {
            app.modal.title = (app.itemEdicion.id != ''?'Edición de ':'Nueva ') + 'Tarea';

        });


    }
});