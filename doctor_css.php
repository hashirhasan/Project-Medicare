<style>

*{
    margin: 0px;
    padding: 0px;

}

body{
   
    background-image: url("image/doc1.jpg");
    background-size: cover;
    background-attachment: fixed;
    height: 100vh;
  
   }




/*on top*/
.search-area{
  position: absolute;
  margin-top:3%; 
  margin-left: 52%;
  width: 250px;
  border: 3px solid #1C65A4;
  background: transparent;
  padding: 10px 25px;
  border-radius: 50px 0 0 50px;
  outline: none;
  font-size: 18px;
  color: #fff;
}
.search-button{
  position: absolute;
  margin-top:3%; 
  margin-left: 69%;
  border: 0px;
  width: 110px;
  height: 45px;
  border-radius: 0 50px 50px 0;
  font-size: 17px;
  background-color: #00569F;
  color: white;
}

.search-button:hover{
    background:white ;
    color: red;
    cursor: pointer;
    transition: 0.7s;
    font-size: 19px;
}



.container{
  background-color: white;
  opacity: 0.9;
  width: 80% ;
  height: 240px auto;
  box-shadow: 0px 8px 5px 0 rgba(0,0,0,0.5);
  display: flex;
  margin-left:9%;
  margin-top: 10%;
  margin-bottom: 6%;
  position: relative;
  border-radius: 10px;
  padding: 10px;
  }

.doc-pic{
  flex:1;
  order: 1;

}
.doc-pic img{
  width: 70%;
  height: 75%;
  border-radius: 50%;
  padding: 10px;
  margin-top: 9px;
  margin-left: 7px;
}
.doc-price{
  flex: 2;
  order: 2;
  margin-left: 17px;

}
.doc-price h2{
  font-family: arial;
  font-size: 18px;
  margin-top: 5%;
}
.doc-price p{
  font-family: arial;
  margin-top: 2%;
  margin-bottom: 2%;
}
.doc-alt{
  flex: 1;
  order: 3;
  margin-left: 5%;
  margin-top: 2%;
  
}
.doc-alt h3{
font-family: arial;
margin-top: 5%;
}


.alt-btn{
  position: relative;
  text-decoration: none;
  padding: 10px;
    top: 10px;
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
    z-index: 99;
}
.alt-btn:hover {
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
  background: rgba(0, 0, 0, 1);
  transition: opacity 500;
  visibility: hidden;
  opacity: 0;
  transition:0.6s;
  z-index: 999;
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
    padding: 10px;
    text-decoration: none;
   bottom: 13px;
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
    margin-top: 4px;
    z-index: 99;
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
  z-index: 999;
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