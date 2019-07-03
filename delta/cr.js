var i=0;
function add(type) {
    i++;
    var element = document.createElement("input");
    var label = document.createElement("input");
    var container = document.getElementById("container");

    label.setAttribute("type","text");
    label.setAttribute("name", i);
    label.placeholder="Type your question"
    container.appendChild(label);

    i++;

    element.setAttribute("type", type);
    element.setAttribute("name", i);
    element.disabled=true;
    
    container.appendChild(element);
    container.appendChild(document.createElement("br"));    
}