var animation = false,
    animationstring = 'animation',
    keyframeprefix = '',
    domPrefixes = 'Webkit Moz O ms Khtml'.split(' '),
    pfx  = '',
    elem = document.createElement('div');

if( elem.style.animationName !== undefined ) { animation = true; }    

if( animation === false ) {
  for( var i = 0; i < domPrefixes.length; i++ ) {
    if( elem.style[ domPrefixes[i] + 'AnimationName' ] !== undefined ) {
      pfx = domPrefixes[ i ];
      animationstring = pfx + 'Animation';
      keyframeprefix = '-' + pfx.toLowerCase() + '-';
      animation = true;
      break;
    }
  }
}

if( animation === false ) {

    // animate in JavaScript fallback
  
  } else {
    elem.style[ animationstring ] = 'rotate 1s linear infinite';
  
    var keyframes = '@' + keyframeprefix + 'keyframes rotate { '+
                      'from {' + keyframeprefix + 'transform:rotate( 0deg ) }'+
                      'to {' + keyframeprefix + 'transform:rotate( 360deg ) }'+
                    '}';
  
    if( document.styleSheets && document.styleSheets.length ) {
  
        document.styleSheets[0].insertRule( keyframes, 0 );
  
    } else {
  
      var s = document.createElement( 'style' );
      s.innerHTML = keyframes;
      document.getElementsByTagName( 'head' )[ 0 ].appendChild( s );
  
    }
    
  }