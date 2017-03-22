  #!/bin/bash
cd storage
chmod 775 .
find -type d -exec chmod 775 {} \;
find -type f -exec chmod 664 {} \;
cd ..
chgrp -R SistemasNTI .