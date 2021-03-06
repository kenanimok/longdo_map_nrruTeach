vec3 transformedPos = pmvMatrix * vec3(vertexCoordsArray.xy, 1.0); 
        gl_Position.xy = transformedPos.xy / transformedPos.z; 
        vec2 viewportCoords = (gl_Position.xy + 1.0) * halfViewportSize; 
        vec3 hTexCoords = brushTransform * vec3(viewportCoords, 1); 
        float invertedHTexCoordsZ = 1.0 / hTexCoords.z; 
        gl_Position = vec4(gl_Position.xy * invertedHTexCoordsZ, 0.0, invertedHTexCoordsZ); 
        index = (dot(linearData.xy, hTexCoords.xy) * linearData.z) * invertedHTexCoordsZ; 
    }
      
    in      vec2      vertexCoordsArray; 
    in      vec3      pmvMatrix1; 
    in      vec3      pmvMatrix2; 
    in      vec3      pmvMatrix3; 
    out     vec2      A; 
    uniform vec2      halfViewportSize; 
    uniform mat3      brushTransform; 
    void setPosition(void) 
    { 
        mat3 pmvMatrix = mat3(pmvMatrix1, pmvMatrix2, pmvMatrix3); 
        vec3 transformedPos = pmvMatrix * vec3(vertexCoordsArray.xy, 1.0); 
        gl_Position.xy = transformedPos.xy / transformedPos.z; 
        vec2  viewportCoords = (gl_Position.xy + 1.0) * halfViewportSize; 
        vec3 hTexCoords = brushTransform * vec3(viewportCoords, 1); 
        float invertedHTexCoordsZ = 1.0 / hTexCoords.z; 
        gl_Position = vec4(gl_Position.xy * invertedHTexCoordsZ, 0.0, invertedHTexCoordsZ); 
        A = hTexCoords.xy * invertedHTexCoordsZ; 
    }
 
    in      vec2      vertexCoordsArray;
    in      vec3      pmvMatrix1; 
    in      vec3      pmvMatrix2; 
    in      vec3      pmvMatrix3; 
    out     float     b; 
    out     vec2      A; 
    uniform vec2      halfViewportSize; 
    uniform mat3      brushTransform; 
    uniform vec2      fmp; 
    uniform vec3      bradius; 
    void setPosition(void) 
    {
        mat3 pmvMatrix = mat3(pmvMatrix1, pmvMatrix2, pmvMatrix3); 
        vec3 transformedPos = pmvMatrix * vec3(vertexCoordsArray.xy, 1.0); 
        gl_Position.xy = transformedPos.xy / transformedPos.z; 
        vec2 viewportCoords = (gl_Position.xy + 1.0) * halfViewportSize; 
        vec3 hTexCoords = brushTransform * vec3(viewportCoords, 1); 
        float invertedHTexCoordsZ = 1.0 / hTexCoords.z; 
        gl_Position = vec4(gl_Position.xy * invertedHTexCoordsZ, 0.0, invertedHTexCoordsZ); 
        A = hTexCoords.xy * invertedHTexCoordsZ; 
        b = bradius.x + 2.0 * dot(A, fmp); 
    }
  
    in      vec2      vertexCoordsArray; 
    in      vec3      pmvMatrix1; 
    in      vec3      pmvMatrix2; 
    in      vec3      pmvMatrix3; 
    out     vec2      brushTextureCoords; 
    uniform vec2      halfViewportSize; 
    uniform vec2      invertedTextureSize; 
    uniform mat3      brushTransform; 
    
    void setPosition(void) 
    { 
        mat3 pmvMatrix = mat3(pmvMatrix1, pmvMatrix2, pmvMatrix3); 
        vec3 transformedPos = pmvMatrix * vec3(vertexCoordsArray.xy, 1.0); 
        gl_Position.xy = transformedPos.xy / transformedPos.z; 
        vec2 viewportCoords = (gl_Position.xy + 1.0) * halfViewportSize; 
        vec3 hTexCoords = brushTransform * vec3(viewportCoords, 1); 
        float invertedHTexCoordsZ = 1.0 / hTexCoords.z; 
        gl_Position = vec4(gl_Position.xy * invertedHTexCoordsZ, 0.0, invertedHTexCoordsZ); 
        brushTextureCoords.xy = (hTexCoords.xy * invertedTextureSize) * gl_Position.w; 
    }
  ?9?P/ Q/?oz'?T/?T/?T/|T/?T/?T/?T/
    void setPosition(); 
    void main(void) 
    { 
        setPosition(); 
    }
    
    attribute highp   vec2      textureCoordArray; 
    varying   highp   vec2      textureCoords; 
    void setPosition(); 
    void main(void) 
    { 
        setPosition(); 
        textureCoords = textureCoordArray; 
    }
    
    attribute highp   vec2      textureCoordArray; 
    attribute lowp    float     opacityArray; 
    varying   highp   vec2      textureCoords; 
    varying   lowp    float     opacity; 
    void setPosition(); 
    void main(void) 
    { 
        setPosition(); 
        textureCoords = textureCoordArray; 
        opacity = opacityArray; 
    }
  
    attribute highp   vec2      vertexCoordsArray; 
    attribute highp   vec3      pmvMatrix1; 
    attribute highp   vec3      pmvMatrix2; 
    attribute highp   vec3      pmvMatrix3; 
    void setPosition(void) 
    { 
        highp mat3 pmvMatrix = mat3(pmvMatrix1, pmvMatrix2, pmvMatrix3); 
        vec3 transformedPos = pmvMatrix * vec3(vertexCoordsArray.xy, 1.0); 
        gl_Position = vec4(transformedPos.xy, 0.0, transformedPos.z); 
    }
      
    uniform highp mat3 matrix; 
    attribute highp vec2 vertexCoordsArray; 
    void setPosition(void) 
    { 
      gl_Position = vec4(matrix * vec3(vertexCoordsArray, 1), 1);
    } 
      
    attribute highp   vec4      vertexCoordsArray; 
    void setPosition(void) 
    { 
        gl_Position = vertexCoordsArray; 
    }
    