ww��ww��hwxp   �����ww~�   ��w����www�   x��wwwwwwp   x����ww��x    �wwwwww��p    �wwwwwww����   wwwwwwww���    wwwwwwwwx���   wwwwwwwx�wp        wwwpwp    ������  �  �  �  �  �  �  �   �   �   �   �   �  �  �  �  �  �  �  �  �  ?�  ?�  �  ��  �         �  ��a�         �       <?xml version='1.0' encoding='utf-8' standalone='yes'?>
<assembly
    xmlns='urn:schemas-microsoft-com:asm.v3'
    xmlns:xsd='http://www.w3.org/2001/XMLSchema'
    xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance'
    manifestVersion='1.0'
    >
  <assemblyIdentity
      buildType='$(build.buildType)'
      language='neutral'
      name='MSEdge.ETW'
      processorArchitecture='$(build.arch)'
      publicKeyToken='$(Build.WindowsPublicKeyToken)'
      version='$(build.version)'
      versionScope='nonSxS'
      />
  <instrumentation
      xmlns:win='http://manifests.microsoft.com/win/2004/08/windows/events'
      buildFilter='not build.isWow'
      >
    <events xmlns='http://schemas.microsoft.com/win/2004/08/events'>
      <provider
          guid='%ls'
          messageFileName='%ls'
          name='%ls'
          resourceFileName='%ls'
          symbol='MSEDGE'
          >
        <channels>
          <importChannel
              chid='SYSTEM'
              name='System'
              />
        </channels>
        <templates>
          <template tid='tid_chrome_event'>
            <data
                inType='win:AnsiString'
                name='Name'
                />
            <data
                inType='win:AnsiString'
                name='Phase'
                />
            <data
                inType='win:AnsiString'
                name='Arg Name 1'
                />
            <data
                inType='win:AnsiString'
                name='Arg Value 1'
                />
            <data
                inType='win:AnsiString'
                name='Arg Name 2'
                />
            <data
                inType='win:AnsiString'
                name='Arg Value 2'
                />
            <data
                inType='win:AnsiString'
                name='Arg Name 3'
                />
            <data
                inType='win:AnsiString'
                name='Arg Value 3'
                />
          </template>
        </templates>
        <events>
          <event
              channel='SYSTEM'
              level='win:Informational'
              message='$(string.ChromeEvent.EventMessage)'
              opcode='win:Info'
              symbol='ChromeEvent'
              template='tid_chrome_event'
              value='1'
              />
        </events>
      </provider>
    </events>
  </instrumentation>
  <localization>
    <resources culture='en-US'>
      <stringTable>
        <string
            id='ChromeEvent.EventMessage'
            value='Chrome Event: %%1 (%%2)'
            />
      </stringTable>
    </resources>
  </localization>
</assembly>
                       |4   V S _ V E R S I O N _ I N F O     ���     W ) �  W ) �                         �   S t r i n g F i l e I n f o   �   0 4 0 9 0 4 b 0   L   C o m p a n y N a m e     M i c r o s o f t   C o r p o r a t i o n   Z   F i l e D e s c r i p t i o n     M i c r o s o f t   E d g e   I n s t a l l e r     8   F i l e V e r s i o n     8 7 . 0 . 6 6 4 . 4 1   4 
  I n t e r n a l N a m e   s e t u p _ e x e   � 6  L e g a l C o p y r i g h t   C o p y r i g h t   M i c r o s o f t   C o r p o r a t i o n .   A l l   r i g h t s   r e s e r v e d .   < 
  O r i g i n a l F i l e n a m e   s e t u p . e x e   R   P r o d u c t N a m e     M i c r o s o f t   E d g e   I n s t a l l e r     <   P r o d u c t V e r s i o n   8 7 . 0 . 6 6 4 . 4 1   < 
  C o m p a n y S h o r t N a m e   M i c r o s o f t   Z   P r o d u c t S h o r t N a m e   M i c r o s o f t   E d g e   I n s t a l l e r     n )  L a s t C h a n g e   4 7 2 a e 6 7 d c 3 a 4 d 4 4 5 7 a a b 3 6 5 5 4 c 2 a 4 3 5 6 0 3 0 1 c e 8 a     (   O f f i c i a l   B u i l d   1   D    V a r F i l e I n f o     $    T r a n s l a t i o n     	�     M i c r o s o f t   C o r p o r a t i o n  M i c r o s o f t   C o r p o r a t i o n    M i c r o s o f t   C o r p o r a t i o n  M i c r o s o f t   C o r p o r a t i o n  M i c r o s o f t   C o r p o r a t i o n  0@?0@0FKO  M i c r o s o f t  M i c r o s o f t   C o r p o r a t i o n  M i c r o s o f t   C o r p o r a t i o n  M i c r o s o f t   C o r p o r a t i o n  M i c r o s o f t   C o r p o r a t i o n  M i c r o s o f t   C o r p o r a t i o n  M i c r o s o f t   C o r p o r a t i o n  M i c r o s o f t   C o r p o r a t i o n  M i c r o s o f t   C o r p o r a t i o n  M i c r o s o f t   C