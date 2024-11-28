package nov22;



import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;
import java.util.function.Predicate;
import java.util.stream.Collectors;
import java.util.stream.Stream;


public class LambdaCollectionAPIMain {


public static void main(String[] args) {
//Stream API
List<Integer> lst = new ArrayList<Integer>();

for(int i=1;i<=10;i++) {
lst.add(i);
}
// List<Integer> result = new ArrayList<Integer>();
// Iterator<Integer> itobj = lst.iterator();
// 
// while(itobj.hasNext()) {
// int n=itobj.next();
// if(n>5) {
// result.add(n);
// }
// }
// System.out.println(result);

Stream<Integer> sm = lst.stream();

List<Integer> res=sm.filter(x->x>5).collect(Collectors.toList());
System.out.println(res);

// Predicate<Integer> pob=(x)->x>5;
// System.out.println(pob.test(7));

Stream<Integer> sm1 = lst.stream();
List<Integer> res1=sm1.filter(x->x<5).collect(Collectors.toList());
System.out.println(res1);

}


}


