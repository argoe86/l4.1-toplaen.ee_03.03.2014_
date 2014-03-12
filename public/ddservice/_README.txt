* Give permission to write to data/ directory for wwwrun user (or any other user under which apache operates).

* Register your ID-card signing certificate in www.openxades.org test-environment: http://www.openxades.org/upload_cert.php

* Modify DD_WSDL constant in conf.php to point ddservice application against another DigiDocService (TEST or LIVE DigiDocService)

* This application should be run over https, since web signing plugins require https
