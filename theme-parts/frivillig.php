<section class="frivillig_form">
                

<form action="frivillig_signup" id="frivillig_signup">
<div id="form_wrapper">
<fieldset id="frivillig_info">
<div class="form_ctrl">
<label for="frivillig_navn">Navn</label>
<input type="text" name="frivillig_navn" minlength="2" placeholder="Frivillig Frivilligsen" id="frivillig_navn" required>
</div>
<div class="form_ctrl">
<label for="frivillig_email">Mail</label>
<input type="email" name="frivillig_email" minlength="2" placeholder="frivillig@frivillig.dk" id="frivillig_email" required>
</div>
<div class="form_ctrl">
<label for="frivillig_telefon">Telefon</label>
<input type="text" name="frivillig_telefon" maxlength="8" placeholder="12345678" id="frivillig_telefon" required>
</div>
<div class="form_ctrl">
</div>
</fieldset>


<fieldset id="frivillig_omraade">
  <div class="form_ctrl2">
<input type="radio" id="omraade_kommunikation" name="omraade" value="kommunikation" required>
  <label for="omraade_kommunikation" class="radio_label">Kommunikation</label><br>
</div>
<div class="form_ctrl2">
<input type="radio" id="omraade_booking" name="omraade" value="booking" required>
  <label for="omraade_program" class="radio_label">Booking</label><br>
</div>
<div class="form_ctrl2">
<input type="radio" id="omraade_program" name="omraade" value="program" required>
  <label for="omraade_program" class="radio_label">Program</label><br>
</div>
<div class="form_ctrl2">
<input type="radio" id="omraade_sikkerhed" name="omraade" value="sikkerhed" required>
  <label for="omraade_sikkerhed" class="radio_label">Sikkerhed</label><br>
</div>
</fieldset>
</div>

<fieldset>
<label for="fil" id="fil_label">Hvorfor vil du være frivillig på Kurs?</label>
<textarea type="text" name="frivillig_fil" id="frivillig_fil" required> </textarea>
</fieldset>

<div id="submit_wrapper">
<input type="submit" value="SEND" id="submit_frivillig_form">
</div>
</form>

</section>

<div id="ansoegning_popup">
<h2>Tak for din ansøgning!</h2>
</div>

<script>


// alle områder er required, men man kan kun vælge ét, så alle kan ikke være required.
const allRadios = document.querySelectorAll("input[type=radio]"); 
allRadios.forEach((radio) => {
  radio.addEventListener("click", function()  {
    allRadios.forEach((radio) => {
      radio.removeAttribute("required"); 
    })
  })
});

// når man trykker på send, skal formen valideres
  const submitBtn = document.querySelector("#submit_frivillig_form");
  submitBtn.addEventListener("click", function(e) {
    e.preventDefault();
    checkValidity(); 
  });

  // hvis formen er valid (true), startes funktionen get values
  function checkValidity() {
    const isValid = document.querySelector("form").reportValidity(); 
    if (isValid) {
      getValues(); 
    }
  }


// værdierne samles i et objekt
function getValues() {
    const url = "https://kursfestival-884a.restdb.io/rest/frivillig"; 
  const navn = document.querySelector("#frivillig_navn").value;
  const email = document.querySelector("#frivillig_email").value;
  const telefon =
    document.querySelector("#frivillig_telefon").value;
  const fil = document.querySelector("#frivillig_fil").value;
  const omraade = document.querySelector("input[name=omraade]:checked").value;
  const data = {
      frivillignavn: navn, 
      frivilligemail: email, 
      frivilligtelefon: telefon, 
      frivilligansoegning: fil, 
      frivilligomraade: omraade,
  }
  post(data, url);
  emptyInputs(); 
}

// data sendes til databasen
 function post(data, url) {
    const headers = {
  "Content-Type": "application/json",
  "x-apikey": "619634edfc71545b0f5e090f",
  "cache-control": "no-cache",
};
  const postData = JSON.stringify(data);
  fetch(url, {
    method: "post",
    headers: headers,
    body: postData,
  })
    .then((res) => res.json())
    .then((data) => console.log(data));
}

// formen tømmes for indhold efter den er sendt
function emptyInputs() {

// vis popup i tre sekunder 
document.querySelector("#ansoegning_popup").style.display = "block";
setTimeout(() => {
  document.querySelector("#ansoegning_popup").style.display = "none"; 
}, 3000); 

 const checkedRadio = document.querySelector("input[type=radio]:checked"); 
 checkedRadio.checked = false; 

document.querySelector("#frivillig_navn").value = "";
  document.querySelector("#frivillig_email").value = "";
  document.querySelector("#frivillig_telefon").value = "";
  document.querySelector("#frivillig_fil").value = "";
 document.querySelector("input[name=omraade]").value = "";


}


</script>
