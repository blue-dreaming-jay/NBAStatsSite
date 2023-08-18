 
export function add_div (id, txt){
    console.log('cat');
    var div=document.createElement("div");
    div.setAttribute("id", id);
    const text=document.createElement('p');
    text.innerText=txt;
    const line_break=document.createElement('br');

    document.body.append(div);

    div.appendChild(text);
    div.appendChild(line_break);
}

export function add_anchor(text, ref, id, add_break=true){
    console.log('cat');
    const anchor=document.createElement('a');

    const txt=document.createTextNode(text);
    const link=ref;

    anchor.appendChild(txt);
    anchor.title=text;
    anchor.href=link;

    var place=document.getElementById(id);

    place.appendChild(anchor);
    if (add_break==true){
        const line_break=document.createElement('br');
        place.appendChild(line_break);

    };
    
}