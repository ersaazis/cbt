
<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CbMigrationSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Please wait updating the data...');                
        $this->call('CbMigrationData');        
        $this->command->info('Updating the data completed !');
    }
}
class CbMigrationData extends Seeder {
    public function run() {        
		DB::table('paket_ujian')->delete();
		DB::table('paket_ujian')->insert([0=>['id'=>1,'nama'=>'Paket A','created_at'=>NULL,'updated_at'=>NULL],1=>['id'=>2,'nama'=>'Paket B','created_at'=>NULL,'updated_at'=>NULL],2=>['id'=>3,'nama'=>'Paket C','created_at'=>NULL,'updated_at'=>NULL]]);

		DB::table('cb_roles')->delete();
		DB::table('cb_roles')->insert([0=>['id'=>1,'name'=>'Admin'],1=>['id'=>2,'name'=>'Warga Belajar'],2=>['id'=>3,'name'=>'Pemeriksa'],3=>['id'=>4,'name'=>'Penyusun Soal']]);

		DB::table('migrations')->delete();
		DB::table('migrations')->insert([0=>['id'=>62,'migration'=>'2014_10_12_000000_create_users_table','batch'=>1],1=>['id'=>63,'migration'=>'2014_10_12_100000_create_password_resets_table','batch'=>1],2=>['id'=>64,'migration'=>'2016_08_07_152420_create_notifications','batch'=>1],3=>['id'=>65,'migration'=>'2016_08_07_152420_table_modules','batch'=>1],4=>['id'=>66,'migration'=>'2016_08_07_152420_table_roles','batch'=>1],5=>['id'=>67,'migration'=>'2016_08_07_152421_modify_users','batch'=>1],6=>['id'=>68,'migration'=>'2016_08_07_152421_table_menus','batch'=>1],7=>['id'=>69,'migration'=>'2016_08_07_152421_table_role_privileges','batch'=>1],8=>['id'=>70,'migration'=>'2019_08_19_000000_create_failed_jobs_table','batch'=>1],9=>['id'=>71,'migration'=>'2020_02_17_130521_add_column_cb_menus','batch'=>1],10=>['id'=>72,'migration'=>'2021_03_05_151037_create_lembaga_pkbm_dan_paket_ujian','batch'=>1],11=>['id'=>73,'migration'=>'2021_03_05_151531_add_wb_to_users','batch'=>1],12=>['id'=>74,'migration'=>'2021_03_05_152028_create_mapel','batch'=>1],13=>['id'=>75,'migration'=>'2021_03_05_152242_create_soal','batch'=>1],14=>['id'=>76,'migration'=>'2021_03_05_152836_create_soal_essai','batch'=>1],15=>['id'=>122,'migration'=>'2021_03_05_170202_create_jawaban_user','batch'=>2],16=>['id'=>123,'migration'=>'2021_03_05_170216_create_rapot_user','batch'=>2],17=>['id'=>129,'migration'=>'2021_03_06_190253_update_email_at_users','batch'=>3],18=>['id'=>130,'migration'=>'2021_03_07_172310_create_jadwal_ujian','batch'=>3],19=>['id'=>131,'migration'=>'2021_03_08_062338_add_foto_to_rapot_user','batch'=>4],20=>['id'=>132,'migration'=>'2021_03_10_232936_add_pilihan_e_to_soal_pg','batch'=>5],21=>['id'=>133,'migration'=>'2021_03_11_001522_add_jurusan_to_users','batch'=>6],22=>['id'=>134,'migration'=>'2021_03_11_142433_add_jurusan_to_mapel','batch'=>7]]);

		DB::table('cb_modules')->delete();
		DB::table('cb_modules')->insert([0=>['id'=>1,'name'=>'Lembaga PKBM','icon'=>'fa fa-bank','table_name'=>'lembaga_pkbm','controller'=>'AdminLembagaPKBMController','last_column_build'=>'[{"column_label":"PKBM","column_field":"pkbm","column_type":"text","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]},{"column_label":"NPSN","column_field":"npsn","column_type":"text","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]}]'],1=>['id'=>2,'name'=>'Mata Pelajaran','icon'=>'fa fa-book','table_name'=>'mapel','controller'=>'AdminMataPelajaranController','last_column_build'=>'[{"column_label":"Nama","column_field":"nama","column_type":"text","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]},{"column_label":"Paket Ujian","column_field":"paket_ujian_id","column_type":"select_table","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":"paket_ujian","column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":"id","column_option_display":"nama","column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[{"column":"id","primary_key":true,"display":false},{"column":"nama","primary_key":false,"display":false},{"column":"created_at","primary_key":false,"display":false},{"column":"updated_at","primary_key":false,"display":false}]}]'],2=>['id'=>3,'name'=>'Paket Ujian','icon'=>'fa fa-barcode','table_name'=>'paket_ujian','controller'=>'AdminPaketUjianController','last_column_build'=>'[{"column_label":"Nama","column_field":"nama","column_type":"text","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]}]'],3=>['id'=>4,'name'=>'Soal Essai','icon'=>'fa fa-bars','table_name'=>'soal_essai','controller'=>'AdminSoalEssaiController','last_column_build'=>'[{"column_label":"Soal","column_field":"soal","column_type":"text","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]},{"column_label":"Mata Pelajaran","column_field":"mapel_id","column_type":"select_table","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":"mapel","column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":"id","column_option_display":"nama","column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":true,"column_foreign":null,"listTableColumns":[{"column":"id","primary_key":true,"display":false},{"column":"nama","primary_key":false,"display":false},{"column":"paket_ujian_id","primary_key":false,"display":false},{"column":"created_at","primary_key":false,"display":false},{"column":"updated_at","primary_key":false,"display":false}]}]'],4=>['id'=>5,'name'=>'Soal Pilihan Ganda','icon'=>'fa fa-bars','table_name'=>'soal_pg','controller'=>'AdminSoalPgController','last_column_build'=>'[{"column_label":"Soal","column_field":"soal","column_type":"text","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":false,"column_foreign":null,"listTableColumns":[]},{"column_label":"Gambar","column_field":"gambar","column_type":"image","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":false,"column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]},{"column_label":"Video","column_field":"video","column_type":"text","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":false,"column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]},{"column_label":"Jawaban","column_field":"jawaban","column_type":"select_option","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[{"key":"A","label":"A"},{"key":"B","label":"B"},{"key":"C","label":"C"},{"key":"D","label":"D"}],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]},{"column_label":"Tipe Jawaban","column_field":"tipe_jawaban","column_type":"radio","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":null,"column_text_min":null,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[{"key":"text","label":"Text"},{"key":"gambar","label":"Gambar"}],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]},{"column_label":"Pilihan A","column_field":"pilihan_a","column_type":"text","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]},{"column_label":"Pilihan B","column_field":"pilihan_b","column_type":"text","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]},{"column_label":"Pilihan C","column_field":"pilihan_c","column_type":"image","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]},{"column_label":"Pilihan D","column_field":"pilihan_d","column_type":"image","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]},{"column_label":"Mata Pelajaran","column_field":"mapel_id","column_type":"select_table","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":"mapel","column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":"id","column_option_display":"nama","column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[{"column":"id","primary_key":true,"display":false},{"column":"nama","primary_key":false,"display":false},{"column":"paket_ujian_id","primary_key":false,"display":false},{"column":"created_at","primary_key":false,"display":false},{"column":"updated_at","primary_key":false,"display":false}]}]'],5=>['id'=>6,'name'=>'Warga Belajar','icon'=>'fa fa-graduation-cap','table_name'=>'users','controller'=>'AdminWargaBelajarController','last_column_build'=>'[{"column_label":"Name","column_field":"name","column_type":"text","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]},{"column_label":"Photo","column_field":"photo","column_type":"image","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]},{"column_label":"Nisn","column_field":"nisn","column_type":"text","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]},{"column_label":"Paket Ujian","column_field":"paket_ujian_id","column_type":"select_table","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":"paket_ujian","column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":"id","column_option_display":"nama","column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[{"column":"id","primary_key":true,"display":false},{"column":"nama","primary_key":false,"display":false},{"column":"created_at","primary_key":false,"display":false},{"column":"updated_at","primary_key":false,"display":false}]}]'],6=>['id'=>7,'name'=>'Pemeriksa','icon'=>'fa fa-check-square','table_name'=>'users','controller'=>'AdminPemeriksaController','last_column_build'=>'[{"column_label":"Name","column_field":"name","column_type":"text","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]},{"column_label":"Password","column_field":"password","column_type":"text","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[]},{"column_label":"Lembaga Pkbm","column_field":"lembaga_pkbm_id","column_type":"select_table","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":"lembaga_pkbm","column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":"id","column_option_display":"pkbm","column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":null,"column_foreign":null,"listTableColumns":[{"column":"id","primary_key":true,"display":false},{"column":"pkbm","primary_key":false,"display":false},{"column":"npsn","primary_key":false,"display":false},{"column":"created_at","primary_key":false,"display":false},{"column":"updated_at","primary_key":false,"display":false}]}]'],7=>['id'=>9,'name'=>'Jadwal Ujian','icon'=>'fa fa-bars','table_name'=>'jadwal_ujian','controller'=>'AdminJadwalUjianController','last_column_build'=>'[{"column_label":"Mapel","column_field":"mapel_id","column_type":"select_table","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":"mapel","column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":"id","column_option_display":"nama","column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":true,"column_foreign":null,"listTableColumns":[{"column":"id","primary_key":true,"display":false},{"column":"nama","primary_key":false,"display":false},{"column":"created_at","primary_key":false,"display":false},{"column":"updated_at","primary_key":false,"display":false}]},{"column_label":"Paket Ujian","column_field":"paket_ujian_id","column_type":"select_table","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":"paket_ujian","column_date_format":null,"column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":"id","column_option_display":"nama","column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":true,"column_foreign":null,"listTableColumns":[{"column":"id","primary_key":true,"display":false},{"column":"nama","primary_key":false,"display":false},{"column":"created_at","primary_key":false,"display":false},{"column":"updated_at","primary_key":false,"display":false}]},{"column_label":"Tanggal","column_field":"tanggal","column_type":"datetime","column_file_encrypt":"on","column_image_width":null,"column_image_height":null,"column_option_table":null,"column_date_format":"Y-m-d H:i:s","column_text_display_limit":150,"column_text_max":255,"column_text_min":0,"column_money_prefix":null,"column_money_precision":null,"column_money_thousand_separator":null,"column_money_decimal_separator":null,"column_option_value":null,"column_option_display":null,"column_option_sql_condition":null,"column_options":[],"column_sql_query":null,"column_help":null,"column_mandatory":"on","column_browse":"on","column_detail":"on","column_edit":"on","column_add":"on","column_filterable":true,"column_foreign":null,"listTableColumns":[]}]']]);
		DB::table('cb_menus')->delete();
		DB::table('cb_menus')->insert([0=>['id'=>1,'name'=>'Admin dan Pembuat Soal','icon'=>'fa fa-users','path'=>'users','type'=>'path','sort_number'=>0,'cb_modules_id'=>NULL,'parent_cb_menus_id'=>10,'editable'=>0],1=>['id'=>2,'name'=>'Lembaga PKBM','icon'=>NULL,'path'=>NULL,'type'=>'module','sort_number'=>0,'cb_modules_id'=>1,'parent_cb_menus_id'=>NULL,'editable'=>1],2=>['id'=>3,'name'=>'Mata Pelajaran','icon'=>NULL,'path'=>NULL,'type'=>'module','sort_number'=>3,'cb_modules_id'=>2,'parent_cb_menus_id'=>NULL,'editable'=>1],3=>['id'=>4,'name'=>'Paket Ujian','icon'=>NULL,'path'=>NULL,'type'=>'module','sort_number'=>2,'cb_modules_id'=>3,'parent_cb_menus_id'=>NULL,'editable'=>1],4=>['id'=>5,'name'=>'Soal Essai','icon'=>NULL,'path'=>NULL,'type'=>'module','sort_number'=>4,'cb_modules_id'=>4,'parent_cb_menus_id'=>NULL,'editable'=>1],5=>['id'=>6,'name'=>'Soal Pilihan Ganda','icon'=>NULL,'path'=>NULL,'type'=>'module','sort_number'=>5,'cb_modules_id'=>5,'parent_cb_menus_id'=>NULL,'editable'=>1],6=>['id'=>8,'name'=>'Warga Belajar','icon'=>NULL,'path'=>NULL,'type'=>'module','sort_number'=>2,'cb_modules_id'=>6,'parent_cb_menus_id'=>10,'editable'=>1],7=>['id'=>9,'name'=>'Pemeriksa','icon'=>NULL,'path'=>NULL,'type'=>'module','sort_number'=>1,'cb_modules_id'=>7,'parent_cb_menus_id'=>10,'editable'=>1],8=>['id'=>10,'name'=>'Akun','icon'=>'fa fa-address-card-o','path'=>'#','type'=>'path','sort_number'=>1,'cb_modules_id'=>NULL,'parent_cb_menus_id'=>NULL,'editable'=>1],9=>['id'=>12,'name'=>'Jadwal Ujian','icon'=>NULL,'path'=>NULL,'type'=>'module','sort_number'=>0,'cb_modules_id'=>9,'parent_cb_menus_id'=>NULL,'editable'=>1],10=>['id'=>13,'name'=>'Ujian','icon'=>'fa fa-pencil-square-o','path'=>'ujian','type'=>'path','sort_number'=>0,'cb_modules_id'=>NULL,'parent_cb_menus_id'=>NULL,'editable'=>1]]);

		DB::table('cb_role_privileges')->delete();
		DB::table('cb_role_privileges')->insert([0=>['id'=>1,'cb_roles_id'=>1,'cb_menus_id'=>1,'can_browse'=>1,'can_create'=>1,'can_read'=>1,'can_update'=>1,'can_delete'=>1],1=>['id'=>2,'cb_roles_id'=>2,'cb_menus_id'=>1,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],2=>['id'=>3,'cb_roles_id'=>3,'cb_menus_id'=>1,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],3=>['id'=>4,'cb_roles_id'=>4,'cb_menus_id'=>1,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],4=>['id'=>5,'cb_roles_id'=>1,'cb_menus_id'=>2,'can_browse'=>1,'can_create'=>1,'can_read'=>1,'can_update'=>1,'can_delete'=>1],5=>['id'=>6,'cb_roles_id'=>1,'cb_menus_id'=>3,'can_browse'=>1,'can_create'=>1,'can_read'=>1,'can_update'=>1,'can_delete'=>1],6=>['id'=>7,'cb_roles_id'=>1,'cb_menus_id'=>4,'can_browse'=>1,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],7=>['id'=>8,'cb_roles_id'=>1,'cb_menus_id'=>5,'can_browse'=>1,'can_create'=>1,'can_read'=>1,'can_update'=>1,'can_delete'=>1],8=>['id'=>9,'cb_roles_id'=>1,'cb_menus_id'=>6,'can_browse'=>1,'can_create'=>1,'can_read'=>1,'can_update'=>1,'can_delete'=>1],9=>['id'=>10,'cb_roles_id'=>2,'cb_menus_id'=>2,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],10=>['id'=>11,'cb_roles_id'=>2,'cb_menus_id'=>3,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],11=>['id'=>12,'cb_roles_id'=>2,'cb_menus_id'=>4,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],12=>['id'=>13,'cb_roles_id'=>2,'cb_menus_id'=>5,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],13=>['id'=>14,'cb_roles_id'=>2,'cb_menus_id'=>6,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],14=>['id'=>15,'cb_roles_id'=>3,'cb_menus_id'=>2,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],15=>['id'=>16,'cb_roles_id'=>3,'cb_menus_id'=>3,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],16=>['id'=>17,'cb_roles_id'=>3,'cb_menus_id'=>4,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],17=>['id'=>18,'cb_roles_id'=>3,'cb_menus_id'=>5,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],18=>['id'=>19,'cb_roles_id'=>3,'cb_menus_id'=>6,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],19=>['id'=>20,'cb_roles_id'=>4,'cb_menus_id'=>2,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],20=>['id'=>21,'cb_roles_id'=>4,'cb_menus_id'=>3,'can_browse'=>1,'can_create'=>1,'can_read'=>1,'can_update'=>1,'can_delete'=>1],21=>['id'=>22,'cb_roles_id'=>4,'cb_menus_id'=>4,'can_browse'=>1,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],22=>['id'=>23,'cb_roles_id'=>4,'cb_menus_id'=>5,'can_browse'=>1,'can_create'=>1,'can_read'=>1,'can_update'=>1,'can_delete'=>1],23=>['id'=>24,'cb_roles_id'=>4,'cb_menus_id'=>6,'can_browse'=>1,'can_create'=>1,'can_read'=>1,'can_update'=>1,'can_delete'=>1],24=>['id'=>28,'cb_roles_id'=>1,'cb_menus_id'=>10,'can_browse'=>1,'can_create'=>1,'can_read'=>1,'can_update'=>1,'can_delete'=>1],25=>['id'=>29,'cb_roles_id'=>1,'cb_menus_id'=>9,'can_browse'=>1,'can_create'=>1,'can_read'=>1,'can_update'=>1,'can_delete'=>1],26=>['id'=>30,'cb_roles_id'=>1,'cb_menus_id'=>8,'can_browse'=>1,'can_create'=>1,'can_read'=>1,'can_update'=>1,'can_delete'=>1],27=>['id'=>31,'cb_roles_id'=>2,'cb_menus_id'=>10,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],28=>['id'=>32,'cb_roles_id'=>2,'cb_menus_id'=>9,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],29=>['id'=>33,'cb_roles_id'=>2,'cb_menus_id'=>8,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],30=>['id'=>34,'cb_roles_id'=>3,'cb_menus_id'=>10,'can_browse'=>1,'can_create'=>1,'can_read'=>1,'can_update'=>1,'can_delete'=>1],31=>['id'=>35,'cb_roles_id'=>3,'cb_menus_id'=>9,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],32=>['id'=>36,'cb_roles_id'=>3,'cb_menus_id'=>8,'can_browse'=>1,'can_create'=>1,'can_read'=>1,'can_update'=>1,'can_delete'=>1],33=>['id'=>37,'cb_roles_id'=>4,'cb_menus_id'=>10,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],34=>['id'=>38,'cb_roles_id'=>4,'cb_menus_id'=>9,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],35=>['id'=>39,'cb_roles_id'=>4,'cb_menus_id'=>8,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],36=>['id'=>40,'cb_roles_id'=>1,'cb_menus_id'=>12,'can_browse'=>1,'can_create'=>1,'can_read'=>1,'can_update'=>1,'can_delete'=>1],37=>['id'=>41,'cb_roles_id'=>1,'cb_menus_id'=>13,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],38=>['id'=>42,'cb_roles_id'=>2,'cb_menus_id'=>12,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],39=>['id'=>43,'cb_roles_id'=>2,'cb_menus_id'=>13,'can_browse'=>1,'can_create'=>1,'can_read'=>1,'can_update'=>1,'can_delete'=>1],40=>['id'=>44,'cb_roles_id'=>3,'cb_menus_id'=>12,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],41=>['id'=>45,'cb_roles_id'=>3,'cb_menus_id'=>13,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],42=>['id'=>46,'cb_roles_id'=>4,'cb_menus_id'=>12,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0],43=>['id'=>47,'cb_roles_id'=>4,'cb_menus_id'=>13,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0]]);
	}
}
	