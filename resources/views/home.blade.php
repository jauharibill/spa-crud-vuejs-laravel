<!DOCTYPE html>
<html>
<head>
	<title>SPA</title>
{{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css"> --}}
</head>
<body>


<div id="MyData">
<div class="box box-info">
<div class="box-header with-border">
<button @click="formSaveBooks()">Tambah buku</button>
	<div v-if="form">
	<h3 class="box-title">Simpan Buku</h3>
	</div>
	<div v-else>
	<h3 class="box-title">Update Buku</h3>
	</div>
</div>
<div class="box-body">
<form class="form-horizontal col-md-6 center">
	<div class="form-group">
		<input type="text" class="form-control" name="nama" placeholder="Nama" v-model="nama">
	</div>
	<div class="form-group">
		<input type="text" class="form-control" name="kategori" placeholder="Kategori" v-model="kategori">
	</div>
	<div class="form-group">
		<textarea class="form-control" name="deskripsi" v-model="deskripsi"></textarea>
	</div>
	<div class="form-group">
		<div v-if="form">
			<button class="btn btn-success" v-on:click="saveBooks()" type="button">Save</button>
		</div>
		<div v-else>
			<button class="btn btn-success" v-on:click="updateBooks()" type="button">Update</button>
		</div>
	</div>
	<div class="form-group">
		@{{result}}
	</div>
</form></div>

</div>
<div class="box box-success">
	<table class="table table-hover with-border">
		<tr><th>#</th><th>Nama</th><th>Kategori</th><th>Deskripsi</th><th>Action</th></tr>
		<tr v-for="data in dataBooks">
			<td>@{{$index}}</td>
			<td>@{{data.nama}}</td>
			<td>@{{data.kategori}}</td>
			<td width="300px">@{{data.deskripsi}}</td>
			<td><button @click="formUpdateBooks(data)">..</button></td>
			<td><button @click="deleteBooks(data)">X</button></td>
		</tr>
	</table>
</div>
</div><script type="text/javascript" src="{{url('js/bundles.js')}}"></script>
</body>
</html>