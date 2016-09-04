var vue = require('vue');
new vue({
el:"#MyData",
data:{
	dataText:"",
	dataBooks:[]
},
methods:{
	saveBooks:function(){
		this.dataBooks.push({'nama':this.dataText});
	},
	deleteBooks:function(){
		this.dataBooks.slice($index,1);
	}
}
});