# SmartApp Task - Laravel 11 API ile Üyelik Yönetim Sistemi

Bu proje, **Laravel 11** kullanılarak geliştirilmiş bir **üyelik yönetim API'sidir**. Kullanıcılar sisteme kayıt olabilir, listelenebilir, güncellenebilir ve soft delete yöntemiyle silinebilir.

## Proje Gereksinimleri

-   Kullanıcı kayıt sistemi oluşturulmalıdır.
-   Kullanıcılar firma adı, ad, soyad, e-posta ve telefon numarası ile kayıt olabilmelidir.
-   Kullanıcı listeleme fonksiyonu kriterlere uygun sonuç döndürmelidir.
-   Kullanıcı bilgileri güncellenebilir olmalıdır.
-   Kullanıcılar **soft delete** yöntemiyle silinebilir.
-   **Veritabanı dosyası (.sql) eklenerek GitHub repository'ye yüklenmelidir.**
-   **Authorization** (kimlik doğrulama) gerekmeyecek, **public bir API** olacaktır.
-   **Bir firmaya birden fazla kullanıcı bağlanabilecektir.**

## Proje Özellikleri

-   **Laravel 11** ile geliştirilmiştir.
-   **Service-Repository Pattern** kullanılmıştır.
-   **RESTful API mimarisi** ile oluşturulmuştur.
-   **Soft Delete** Kullanılmıştır.
-   **API Resource Routes** ile CRUD işlemleri desteklenmektedir.
-   **Bir firmaya birden fazla kullanıcı bağlanabilir.**
-   **Validation** için Laravel'in `FormRequest` sınıfı kullanılmıştır.
-   **Postman veya herhangi bir API istemcisi ile kolayca test edilebilir.**
-   **Veritabanı dosyası (.sql) eklenmiştir.**
-   **Public API** olduğu için **kimlik doğrulama (authorization) gerekmemektedir.**

## Kurulum Kurulumu

### Projeyi Klonlayın

```bash
git clone https://github.com/EsinnOrc/smartapp-task.git
cd smartapp-task
```
