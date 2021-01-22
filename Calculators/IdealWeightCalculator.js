function calculateidealweight()
{
    console.log("entered func");
    const gender = document.getElementById("gender").value
    const height = parseFloat(document.getElementById("height").value)
    const age = parseFloat(document.getElementById("age").value)
    const inch = ((height/2.54)-60)
    if(inch>=0)
    {
    if(gender == "male")
    {
        Robinson.innerHTML=(52+(1.9*inch)).toFixed(1)
        Miller.innerHTML=(56.2+(1.41*inch)).toFixed(1)
        Devine.innerHTML=(50+(2.3*inch)).toFixed(1)
        Hamwi.innerHTML=(48+(2.7*inch)).toFixed(1)
    }
    else 
    {
      Robinson.innerHTML=(47+(1.7*inch)).toFixed(1)
      Miller.innerHTML=(53.1+(1.36*inch)).toFixed(1)
      Devine.innerHTML=(45.5+(2.3*inch)).toFixed(1)
      Hamwi.innerHTML=(45.5+(2.2*inch)).toFixed(1)
    }
    }
    else{
    if(gender == "male")
    {
        Robinson.innerHTML=(52)
        Miller.innerHTML=(56.2)
        Devine.innerHTML=(50)
        Hamwi.innerHTML=(48)
    }
    else 
    {
      Robinson.innerHTML=(47)
      Miller.innerHTML=(53.1)
      Devine.innerHTML=(45.5)
      Hamwi.innerHTML=(45.5)
    }
    }
    
    document.getElementById("idealweightresulttable").style.display = "block";
}

function resetidealweightValues()
{
  const rb = document.getElementsByClassName("rad")
  for(var i = 0; i < rb.length; i ++)
  {
    rb[i].checked = false
  }
  
  document.getElementById("height").value = "" 
  document.getElementById("age").value = ""
  document.getElementById("calorieresulttable").style.display= "none"
  
  document.getElementById("idealweightresulttable").style.display = "none";
}