/*
// ------------------------------------------------------------------------------
// Written by: Alexander Alessi
// -----------------------------------------------------------------------------
*/

var loc = document.getElementsByName('location');
var sub = document.getElementById('sub');
var aptSize = document.getElementsByName('aptSize');
var price = document.getElementsByName('price');
var select = document.getElementById('dropdown');
var fieldset = document.getElementById('fieldset3');
sub.addEventListener('submit', submit, false);

function submit() {
    var moreThanFive = false;
    var size = false;
    var priceRange = false;
    var dTown = false;
    
    if(loc[0].checked)
        dTown = true;
    
    for(var i=0; i<(price.length-1);i++) // if rent is below 1000$ a month
    {
        if(select.value == price[i].value)
            priceRange = true;
    }
    
    for(var i=2; i<aptSize.length;i++) // if size is 4 and a half, and above
    {
        if(aptSize[i].checked)
            size = true;
    }
    
    if(dTown==true && size==true)
    {
        if(priceRange==true)
        {
            fieldset.style.display = "block";
            fieldset.children[1].innerHTML = "Normally an apartment of 4 ½ and above costs more than 1000$ in downtown area";
        }
        else if(aptSize[4].checked)
        {
            fieldset.style.display = "block";
            fieldset.children[1].innerHTML = "It is very difficult to find an apartment larger than 5 ½ in downtown.";
        }
    }
    else
    {
        fieldset.style.display = "none";
    }
}