
/**
 * Configuracion  de proxy interna para permitir 
 * peticiones dentro del proyecto.
 *  
 */
  const proxy = [
    {
      context: '/api/persona/*',
      target: 'http://localhost:8000',
      secure:false,
      changeOrigin:true,
      pathRewrite: {'^/api/persona' : ''}
    }
  ];

  module.exports = proxy;
  