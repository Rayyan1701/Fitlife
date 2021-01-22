function calculatecalories()
{
    console.log("entered func");
    const gender = document.getElementById("gender").value
    const weight = parseFloat(document.getElementById("weight").value)
    const height = parseFloat(document.getElementById("height").value)
    const age = parseFloat(document.getElementById("age").value)
    const activity = parseFloat(document.getElementById("floatingSelectGrid").value)

    if(gender == "male")
    {
        maintain.innerHTML=(activity*((10*weight)+(6.25*height)-(5*age)+5)).toFixed(0)
    }
    else 
    {
      maintain.innerHTML=(activity*((10*weight)+(6.25*height)-(5*age)+161)).toFixed(0)               
    }
    mildloss.innerHTML=(0.91*maintain.innerHTML).toFixed(0)
    loss.innerHTML=(0.82*maintain.innerHTML).toFixed(0)
    extremeloss.innerHTML=(0.65*maintain.innerHTML).toFixed(0)
    document.getElementById("calorieresulttable").style.display = "block";
}

function reset()
{
  console.log("entered func");
  const rb = document.getElementsByClassName("rad")
  for(var i = 0; i < rb.length; i ++)
  {
    rb[i].checked = false
  }
  document.getElementById("weight").value = ""
  document.getElementById("height").value = "" 
  document.getElementById("age").value = ""
  document.getElementById("calorieresulttable").style.display= "none"
 
  const activity = document.getElementById('activityLevel')
  activity.value = 0

  document.getElementById("calorieresulttable").style.display = "none";
}