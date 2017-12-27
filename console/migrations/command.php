<!-- //create table patient
.\yii migrate/create create_oncology_patient_table --fields="patient_name:string(100):notNull,gender:string(3):notNull,age:integer(11):notNull,mobile:string(50):notNull,photo:string(100),address:string(300)"
//create table case>
.\yii migrate/create create_oncology_case_table --fields="cancer_type:string(100):notNull,oncology_patient_id:integer:notNull:foreignKey(oncology_patient)"
//create table ask_question 
.\yii migrate/create create_oncology_askquestion_table --fields="name_patient:string(200):notNull,email:string(200):notNull,mobile_number:string(25):notNull,content:text:notNull,create_at:integer:notNull,updated_at:integer:notNull"
//create table lookuptype
.\yii migrate/create create_oncology_lookuptype_table --fields="name:string(100):notNull"
//create table lookupitem
.\yii migrate/create create_oncology_lookupitem_table --fields="name:string(100):notNull,desc:text:notNull,oncology_lookuptype_id:integer(11):notNull:foreignKey(oncology_lookuptype)"
//create table postnews
.\yii migrate/create create_oncology_postnews_table --fields="title:string(300),content:text:notNull,short_desc:text,created_at:integer:notNull,photo:string(200),category_id:integer(11):notNull:foreignKey(oncology_lookupitem)"
//create table hospital
.\yii migrate/create create_oncology_hospital_table --fields="hospital_name:string(150):notNull,address:text:notNull,email:string(100):notNull,mobile:string(25):notNull"
//create table doctor
.\yii migrate/create create_oncology_doctor_table --fields="doctor_name:string(100):notNull,email:string(100):notNull,mobile:string(25):notNull,address:text:notNull,department:string(100):notNull,description:text:notNull,hospital_id:integer:notNull:foreignKey(oncology_hospital),image:string(100):notNull,active:integer(2):defaultValue(1):notNull"
//create table booking 
.\yii migrate/create create_oncology_booking_table --fields="patient_name:string(100):notNull,gender:string(3):notNull,mobile:string(25):notNull,email:string(100):notNull,address:text:notNull,type_booking:string(30):notNull,datetimeExam:integer:notNull,symptom:text,created_at:integer:notNull,status:string(30):notNull,chanel_registration:string(20):notNull,hospital_id:integer:notNull:foreignKey(oncology_hospital),BOD:integer:notNull,doctor_id:integer:foreignKey(oncology_doctor),active:integer(1):notNull:defaultValue(1),patient_id:integer:foreignKey(oncology_patient)" 
//create table oncology_post_category
.\yii migrate/create create_oncology_post_category_table --fields="name:string:unique:notNull,slug:string:unique:notNull,parent:string:notNull:defaultValue(0),status:smallInteger:notNull:defaultValue(0),created_at:integer:notNull,updated_at:integer:notNull"
-->
<!--
//create  table for user 
//create table auth_user
.\yii migrate/create create_auth_user_table --fields="password:string(128):notNull,last_login:integer,is_superuser:integer(1):notNull,username:string(150):notNull,fir
st_name:string(30):notNull,last_name:string(30):notNull,email:string(254):notNull,is_staff:integer(1):notNull,is_active:integer(1):notNull,date_joined:integer:notNull"
//create table auth_session
.\yii migrate/create create_auth_session_table --fields="session_key:string(40),session_data:text,expired_date:integer"
//create table content_type
.\yii migrate/create create_content_type_table --fields="app_label:string(100):notNull,model:string(100):notNull"

//create table auth_permission
.\yii migrate/create create_auth_permission_table --fields="name:string(255):notNull,content_type_id:integer(11):notNull:foreignKey(content_type)"
//create table auth_user_permission
.\yii migrate/create create_auth_user_permissions_table --fields="user_id:integer(11):foreignKey(auth_user):notNull,permission_id:integer(11):notNull:foreignKey(auth_permission),code_name:string(100):notNull"
//create auth group table
.\yii migrate/create create_auth_group_table --fields="name:string(80):notNull"
//create auth_user_groups table
.\yii migrate/create create_auth_user_groups_table --fields="user_id:integer(11):notNull:foreignKey(auth_user),group_id:integer(11):notNull:foreignKey(auth_group)"
//create auth_group_permission_table
.\yii migrate/create create_auth_group_permissions_table --fields="group_id:integer(11):notNull:foreignKey(auth_group),permission_id:integer(11):notNull:foreignKey(auth_permission)"
//create admin_log
.\yii migrate/create create_admin_log_table --fields="action_time:integer:notNull,object_id:text:notNull,object_repr:string(200):notNull,action_flag:integer(5),change_message:text,content_type_id:integer(11):notNull:foreignKey(content_type),user_id:integer(11):notNull:foreignKey(auth_user)"
//add content_type_column
.\yii migrate/create add_code_name_column_to_auth_permission_table --fields="code_name:string(100):notNull"
-->
<!--
test post
.\yii migrate/create create_oncology_post_table --fields="name:string,category:integer:defaultValue(0),slug:string:notNull:unique,image:string,desc:string,content:text:notNull,author:string:notNull,status:smallInteger:notNull:defaultValue(0),publish_at:integer:notNull,created_at:integer:notNull,updated_at:integer:notNull"
-->