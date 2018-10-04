<style>
body{
    background-color: #3DA2F8;
    background-image: url("image/med5.jpg");
    background-size: cover;
    height: 100vh;
    background-attachment: fixed;
   }


.container{
	background-color: white;
	opacity: 1;
	width: 80% ;
	height: 20px auto;
	box-shadow: 0px 8px 5px 0 rgba(0,0,0,0.5);
	display: flex;
	margin-left:9%;
	margin-top: 6%;
	margin-bottom: 6%;
  border-radius: 10px;
z-index: 3;
    padding: 15px;
    padding-top: 20px;
}

.medi-pic{
	flex:1;
	order: 1;

}
.medi-pic img{
	width: 240px;
	height: 90%;
	padding: 7px;
    margin-left: 9%;
}
.medi-name{
	flex: 2;
	order: 2;

}
.medi-name h2{
	font-family: arial;
	font-size: 18px;
}
.medi-name p{
	font-family: arial;
}
.medi-price{
	flex: 1;
	order: 3;
	justify-content: flex-end;

}
.medi-price h3{
font-family: arial;
}


.alt-btn{
	position: relative;
	text-decoration: none;
	padding: 10px;
    top: 17px;
    left: 150px;
    /*transform:translate(-50%, -50%);*/
    background: #1C65A4;
    color:white;
    font-weight: 10px;
    width: 130px;
    height: 48px;
    border: 2px solid #1C65A4;
    border-radius: 12px;
    font-size: 20px;

    
}
.alt-btn:hover {
  background:white ;
    color: red;
    cursor: pointer;
    transition: 0.6s;
}

    .overlay {
position:relative; 
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500;
  visibility: hidden;
  opacity: 0;
  transition:0.6s;
    z-index: 3;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #F97C76;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

/* @media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
} */
.use-btn {
   position: relative;
   text-decoration: none;
   padding: 10px;
    bottom: 8px;
    left: 0px;
    /*transform:translate(-50%, -50%);*/
    background: #1C65A4;
    color:white;
    font-weight: 10px;
    width: 130px;
    height: 48px;
    border: 2px solid #1C65A4;
    border-radius: 12px;
    font-size: 20px;
    
}

.use-btn:hover{
    background:white ;
    color: red;
    cursor: pointer;
    transition: 0.6s;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color:#F97C76;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}
</style>