document.addEventListener('DOMContentLoaded', function() {
    fetch('usuarios.json')
      .then(response => response.json())
      .then(data => {
        const listaUsuarios = document.getElementById('lista-usuarios');
        data.forEach(usuario => {
          const li = document.createElement('li');
          li.textContent = `Email: ${usuario.email}`;
          listaUsuarios.appendChild(li);
        });
      })
      .catch(error => console.error('Erro ao buscar os dados:', error));
  });
  