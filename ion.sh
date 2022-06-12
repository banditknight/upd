rm -rf ../zproc-deploy/be/*
cp -R * ../zproc-deploy/be/
/home/andre/App/ioncube-pro/ioncube_encoder5_10.0/ioncube_encoder.sh app --replace-target -o ../zproc-deploy/be/app/
/home/andre/App/ioncube-pro/ioncube_encoder5_10.0/ioncube_encoder.sh lib --replace-target -o ../zproc-deploy/be/lib/
/home/andre/App/ioncube-pro/ioncube_encoder5_10.0/ioncube_encoder.sh routes --replace-target -o ../zproc-deploy/be/routes/
/home/andre/App/ioncube-pro/ioncube_encoder5_10.0/ioncube_encoder.sh bootstrap --replace-target -o ../zproc-deploy/be/bootstrap/
/home/andre/App/ioncube-pro/ioncube_encoder5_10.0/ioncube_encoder.sh database --replace-target -o ../zproc-deploy/be/database/
