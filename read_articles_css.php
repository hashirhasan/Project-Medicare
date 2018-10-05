<style>

body{
	background-image:url("image/artic3.jpg");
	background-attachment: fixed;
	background-size: cover;

}




.container{
	display: grid;
	grid-template-columns: 33% 33% 33%;
	grid-gap: 1em;
	padding: 5%;
}

.container div{
	background-color: #eee;
	padding: 4em;
	clip-path: polygon(0 6%, 100% 0%, 100% 94%, 0% 100%);
}


@media (max-width: 1000px){

.container{
	display: grid;
	grid-template-columns: 50% 50%;
}
}


@media (max-width: 700px){

.container{
	display: grid;
	grid-template-columns: 33%;
}
}


.container div h1{
	margin-top: 0;
	text-align:center;
	font-family: arial;
    color:#352722;
}
.container div h5{
	text-align:center;
	font-family: arial;
	margin:4% auto;
}

.container div img{
	margin-left: 4%;
	height: 250px;
	width: 320px;
}


@media (max-width: 1200px) {
	.container div img{
		height: 270px;
		width: 300px;
	}
	
}


@media (max-width: 1100px) {
	.container div img{
		height: 240px;
		width: 270px;
	}
	
}


@media (max-width: 1150px) {
	.container div img{
		height: 200px;
		width: 230px;
	}
	
}


@media (max-width: 800px) {
	.container div img{
		height: 200px;
		width: 230px;
		margin-left:10%;

	}
	
}

@media (max-width: 600px) {
	.container div img{
		height: 180px;
		width: 150px;
		margin-left: 9%;
	}
	
}


@media (max-width: 400px) {
	.container div img{
		height: 150px;
		width: 100px;
		margin-left: 11%;
	}
	
}


.container div a{
	text-decoration: none;
}
.container div p{
    margin-top:1%; 
	text-align: center;
	font-family: arial;
	font-size: 16px;
	color: black;
}
/*.container div p:hover{
	transition:0.6s;
}
*/
.container img:hover{
box-shadow: 0 14px 28px rgba(0, 0, 0, .25);
transition:0.6s;
}

</style>