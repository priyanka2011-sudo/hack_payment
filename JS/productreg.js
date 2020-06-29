function add() {
    var div = document.createElement("DIV");
    var x = document.createElement("INPUT");
    var y = document.createElement("INPUT");

    var label = document.createElement("LABEL");
    var lbl = document.createElement("LABEL");
    var inp = document.createElement("INPUT");
    var spn = document.createElement("SPAN");
    var txt = document.createTextNode("Taxable");
    var b_lbl = document.createElement("LABEL");
    var rm = document.createElement("BUTTON");
    var img = document.createElement("IMG");

    label.setAttribute("class","txt");
    label.setAttribute("id","txt");
    lbl.setAttribute("class","switch");
    inp.setAttribute("type","checkbox");
    spn.setAttribute("class","slider round");
    b_lbl.setAttribute("class","btn");
    rm.setAttribute("type","button");
    rm.setAttribute("onclick","remove()");
    img.setAttribute("class","icon");
    img.setAttribute("src","Media/rm.png");

    div.setAttribute("id","div");

    x.setAttribute("type", "text");
    x.setAttribute("placeholder", "Product Name");   
    x.setAttribute("id", "_new");   

    y.setAttribute("type", "text");
    y.setAttribute("placeholder", "Amount");   
    y.setAttribute("id", "a_new");       
    
    document.form.appendChild(div).appendChild(x);
    document.form.appendChild(div).appendChild(y); 
    document.form.appendChild(div).appendChild(label).appendChild(txt);
    document.form.appendChild(div).appendChild(lbl).appendChild(inp);
    document.form.appendChild(div).appendChild(lbl).appendChild(spn);
    document.form.appendChild(div).appendChild(b_lbl).appendChild(rm).appendChild(img);
    
  }

 function remove()
 {
     var x = document.getElementById("div");
     x.remove();
 }
