function toggleinput(id) {
    const nomeserie = document.getElementById(`nome-serie-${id}`);
    const inputserie = document.getElementById(`input-nome-serie-${id}`);
    if (document.getElementById(`nome-serie-${id}`).hasAttribute('hidden')) {
        nomeserie.removeAttribute('hidden');
        inputserie.hidden = true;
    } else {
        inputserie.removeAttribute('hidden');
        nomeserie.hidden = true;
    }
}