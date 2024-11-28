package nov4;

interface Playable {
    void play();
    
    
    default void tune() {
        System.out.println("Tuning the instrument...");
    }
}

class Guitar implements Playable {
    @Override
    public void play() {
        System.out.println("Strumming the guitar strings");
    }
    
    public void adjustStrings() {
        System.out.println("Adjusting guitar strings");
    }
}

class Piano implements Playable {
    @Override
    public void play() {
        System.out.println("Playing piano keys");
    }
    
    public void liftLid() {
        System.out.println("Lifting piano lid");
    }
}

public class MusicDemo {
    public static void main(String[] args) {

        Playable guitar = new Guitar();
        Playable piano = new Piano();
        
        System.out.println("Playing instruments individually:");
        guitar.tune();  
        guitar.play();  
        
        System.out.println("\nPiano performance:");
        piano.tune();   
        piano.play();  
        
        System.out.println("\nOrchestra performance:");
        Playable[] instruments = {new Guitar(), new Piano()};
        for (Playable instrument : instruments) {
            instrument.play();
        }
        
        Guitar actualGuitar = (Guitar) guitar;
        actualGuitar.adjustStrings();
    }
}