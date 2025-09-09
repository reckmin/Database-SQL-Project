public class Category {
    private int main_category_id;
    private String category_name;

    public Category ( int main_category_id, String category_name){
        this.main_category_id=main_category_id;
        this.category_name= category_name;
    }

    public String getCategory_name() {
        return category_name;
    }

    public Integer getMainCat() {
        return main_category_id;
    }

    @Override
    public String toString(){
        return "RentalCategory: "+ category_name + ", " + main_category_id;
    }
}
