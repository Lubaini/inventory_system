
<style>
  
body {
  background-color: #00091b;
  font-family: 'Courier New', Courier, monospace!important;
}

.mainbox {
  background-color: transparent;
  margin-top: 13%;
}

.err {
  color: #4febfe;
  font-size: 11rem;
  text-align: center;
}

a {
  text-decoration: none;
  color: white;
}

a:hover {
  text-decoration: underline;
}
.d-flex {
    display: flex!important;
    justify-content:center!important;
}
.d-flex p {
  font-size: 1.1rem;
  text-align: center;
  color: #ffff;
}
hr {
  width: 70%;
}
.rounded {
  ba
}
</style>
<body>
  <div class="mainbox">
    <div class="err">Oops!</div>
    <hr>
      <div class="d-flex">
         <p> <?php echo $msg; ?> </p>
      </div>
      
      <br>
      
  </div>