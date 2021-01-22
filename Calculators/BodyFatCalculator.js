function resultcalculate()
{
    console.log("entered func");
    const gender = document.getElementById("gender").value
    const weight = document.getElementById("weight").value
    const height = document.getElementById("height").value
    const neck = document.getElementById("neck").value
    const waist = document.getElementById("waist").value
    const hip = document.getElementById("hip").value 
    if(gender == "male")
    {
        fatpercentage.innerHTML=(495/(1.0324-0.19077*(Math.log10(waist-neck))+(0.15456*Math.log10(height)))-450).toFixed(2);
        let BF=(495/(1.0324-0.19077*(Math.log10(waist-neck))+(0.15456*Math.log10(height)))-450).toFixed(2);
        if(BF>=2&&BF<=5){fitness.innerHTML="you do not have essential fat required for a healthy lifestyle" ;}
        else if(BF>=6 && BF<=13 ){ fitness.innerHTML="Athele level of fitness" }
        else if(BF>=14 && BF<=17 ){fitness.innerHTML="You are fit!"}
        else if(BF>=18 && BF<=25 ){fitness.innerHTML="you need to join gym! Come and register yourself in our official website"}
        else {fitness.innerHTML="Obese!!! Come and contact our gym trainer for calorie deficit nutrition, we will guide you:)"}
    }
    else 
    {
        fatpercentage.innerHTML=(495/(1.29579-0.35004*(Math.log10(hip+waist-neck))+(0.221*Math.log10(height)))-450).toFixed(2);
        let BF=(495/(1.29579-0.35004*(Math.log10(hip+waist-neck))+(0.221*Math.log10(height)))-450).toFixed(2);
        if(BF>=10&&BF<=13){fitness.innerHTML="you do not have essential fat required for a healthy lifestyle" ;}
        else if(BF>=14&& BF<=20){ fitness.innerHTML="Athele level of fitness" }
        else if(BF>=21 && BF<=24 ){fitness.innerHTML="You are fit!"}
        else if(BF>=25 && BF<=31 ){fitness.innerHTML="you need to join gym! Come and register yourself in our official website"}
        else {fitness.innerHTML="Obese!!! Come and contact our gym trainer for calorie deficit nutrition, we will guide you:)"}
    }
    bodyfatmass.innerHTML=((fatpercentage.innerHTML/100)*weight);
    leanbodymass.innerHTML=((1-(fatpercentage.innerHTML/100))*weight).toFixed(2);
    document.getElementById("resulttable").style.display = "block";
}

function resetValues()
{
  const rb = document.getElementsByClassName("rad")
  for(var i = 0; i < rb.length; i ++)
  {
    rb[i].checked = false
  }
  document.getElementById("weight").value = ""
  document.getElementById("height").value = ""
  document.getElementById("neck").value = ""
  document.getElementById("waist").value = ""
  document.getElementById("hip").value = ""
  document.getElementById("resulttable").style.display = "none";
}