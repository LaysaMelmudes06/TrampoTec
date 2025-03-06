const btnPdf= document.getElementById('pdf');

btnPdf.addEventListener("click", () => {
    const conteudo = document.getElementById('dashboard').innerHTML;

    let estilo ="<style>"
    estilo += ".align-card{display:flex; gap:10px; margin-left:30px}"
    estilo += ".align-card2{display:flex; gap:10px; margin-top:10px;  margin-left:30px; }"
    estilo += " .card{  width: 140px; height: 100px; padding: 20px 20px 20px 20px;border-radius: 10px;background-color: red;}"
    estilo += ".card h2{color:white;}"
    estilo += ".card h3{color:white;}"
    estilo += "a{text-decoration:none;}"
    estilo += "button{display:none}"
    estilo +="</style>"

    const win = window.open('','','height=700,width=700')

    win.document.write ('<html><head>')
    win.document.write ('<title>Relatório</title>')
    win.document.write (estilo)
    win.document.write ('</head><body>')
    win.document.write (conteudo)
    win.document.write ('</body> </html>')

    win.print()
})