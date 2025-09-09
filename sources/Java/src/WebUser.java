public class WebUser {
    String full_name;
    int age;
    String gender;
    String  email;
    String phone_number;


    public WebUser(String full_name, int age, String gender, String email, String phone_number){
        this.full_name=full_name;
        this.age=age;
        this.gender=gender;
        this.email=email;
        this.phone_number=phone_number;
    }

    public String getFull_name() {
        return full_name;
    }

    public Integer getAge() {
        return age;
    }

    public String getGender() {
        return gender;
    }

    public String getEmail() {
        return email;
    }

    public String getPhone_number() {
        return phone_number;
    }

    @Override
    public String toString(){
        return "WebUser: "+ full_name + ", " + age + ", "+ gender + ", " + email + ", " + phone_number;
    }

}
