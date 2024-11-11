
# CarAssign

Bu proje, şirketlerin, kullanıcıların ve araçların yönetimini kolaylaştıran bir API tabanlı bir platformdur. Kullanıcı yönetimi, araç envanter kontrolü ve şirket bazlı raporlamalar gibi işlevleri ile kurumsal ihtiyaçları karşılamayı hedefler. Lumen framework'ü ile geliştirilmiş bu hızlı ve performans odaklı backend servisi, kurumsal yapılar için özelleştirilmiş çözümler sunmaktadır.


## Özellikler

- **Şirket Yönetimi:** Şirket profillerinin listelenmesi, detaya inilebilmesi ve güncellenmesi.
- **Araç Envanteri:** Araçların listelenmesi, stok durumu.
- **Zimmet Yönetimi:** Araçların hangi şirketler altında kaç adet olduğu, hangi araçlar olduğu, şirket personellerine zimmet edilmiş araçların yönetimi.
- **Yetki Kontrolü:** Kullanıcı türüne göre erişim yetkilendirmesi yapılır; yalnızca belirli yetkilere sahip kullanıcılar belirli işlemleri gerçekleştirebilir.
- **Performans Odaklı:** Lumen’in hafif yapısı sayesinde yüksek performanslı bir API çözümü sunar.

  
## Ortam Gereksinimleri

- PHP 8.x veya üzeri
- Composer
- MySQL
- Lumen 8.x veya üzeri
- Postman veya benzeri bir API istemcisi (isteğe bağlı)

  
## Kurulum 

**Carassign'ı lokalinize klonlayın.**

```bash 
  git clone https://github.com/OBSoft-Berkaycel/CarDebit.git
  cd CarDebit
```
**Bağımlılıkları kurun.**
```bash 
  composer install
```
**Ortam Dosyasını Ayarlayın**

``.env.example`` dosyasını kopyalayarak ``.env`` dosyasını oluşturun ve veritabanı bilgilerinizi düzenleyin.
```bash 
  cp .env.example .env
```

**Uygulama Anahtarını Oluşturun**

```bash 
  php artisan key:generate
```

**Örnek Veritabanını Import Edin**

Veritabanı yönetim konsolunuzdan ``lumenapp`` isimli bir MySQL veritabanı oluşturun. Ardından örnek verileri import edebilmek için ``extra/`` dizini altındaki sql dosyasını kullanabilirsiniz.

**Sunucuyu Başlatın**

```bash 
  php -S localhost:8000 -t public
```



    
## Ekstra

- Örnek Postman collection, projenin root dizini altındaki ``extra`` dizini altındadır.

- Bu proje, talep edilenin üzerine ekstra özellikler eklemek istenerek tasarlanmıştır. Bu bir demo projedir!

## Hedefler

- Otp doğrulama entegrasyonu
- Araç takviye hizmeti(Filo'dan şirketlere araç transfer yönetimi)
- Detaylı raporlama servisleri
- Detaylı araç arama mekanizması(Filtering & Search)