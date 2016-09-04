var vue = require('vue');
var vue_resource = require('vue-resource');
vue.use(vue_resource);
new vue({
	el: "#MyData",
	data:{
		result:"",
		form:true,
		index:null,
		id:"",
		nama:"",
		kategori:"",
		deskripsi:"",
		dataBooks:[]
	},
	ready(){
		this.getBooks();
	},
	methods:{
		formSaveBooks:function(){
			this.form =true;
			this.index = null;
			this.id = "";
			this.nama ="";
			this.kategori = "";
			this.deskripsi = "";
		},
		saveBooks:function(){
			this.result="loading. . .";
			var data = {'nama':this.nama,'kategori':this.kategori,'deskripsi':this.deskripsi};
			this.dataBooks.unshift(data);
			this.$http.post('/data/books',data).then((response)=>{
				this.result="done!";
			},(response)=>{
				alert("Failed save "+this.nama);
			});
		},
		getBooks:function(){
			this.$http.get('/data/books').then((response)=>{
				this.dataBooks = response.json();
				// console.log(this.dataBooks);
				// console.log(response);
			}, (response)=>{
				alert("Failed get list data");
			});
		}
		,
		deleteBooks:function(data){
			this.result="loading. . .";
			this.$http.get('/data/delete/'+data.id).then((response)=>{
				this.index = this.dataBooks.indexOf(data);
		 		this.dataBooks.splice(this.index, 1);	
		 		this.result="Done";
			},(response)=>{
				alert("delete Failed : "+data.id);
			});
			
		}
		,
		formUpdateBooks:function(data){
			this.form =false;
			this.index = this.dataBooks.indexOf(data);
			this.id = data.id;
			this.nama = data.nama;
			this.kategori = data.kategori;
			this.deskripsi = data.deskripsi;
		},
		updateBooks:function(){
			this.result="loading. . .";
			var updatedata = {'id':this.id,'nama':this.nama,'kategori':this.kategori,'deskripsi':this.deskripsi};
			this.$http.post('/data/update',updatedata).then((response)=>{
				this.dataBooks[this.index].nama = this.nama;
				this.dataBooks[this.index].kategori = this.kategori;
				this.dataBooks[this.index].deskripsi = this.deskripsi;
				this.result="Done";
			},(response)=>{
				alert("failed update "+this.nama);
			});	
		}
		,
		test:function(){
			console.log('hello');
		}
	}	
})