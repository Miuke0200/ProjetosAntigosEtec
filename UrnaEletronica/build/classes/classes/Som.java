/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package classes;

import java.io.File;
import java.io.IOException;
import javax.sound.sampled.AudioInputStream;
import javax.sound.sampled.AudioSystem;
import javax.sound.sampled.Clip;
import javax.sound.sampled.LineUnavailableException;
import javax.sound.sampled.UnsupportedAudioFileException;

/**
 *
 * @author Aluno
 */
public class Som {
     public void Som (String soundName)
           {
//        Media pick = new Media(som); 
//        MediaPlayer player = new MediaPlayer(pick);
//        player.play();
 try
              {
                 AudioInputStream audioInputStream = AudioSystem.getAudioInputStream(new File(soundName).getAbsoluteFile());
                 Clip clip = AudioSystem.getClip();
                 clip.open(audioInputStream);
                 clip.start();
            }
            catch (IOException | LineUnavailableException | UnsupportedAudioFileException ex)
           {
               System.out.println("Erro ao executar SOM!");
           }
           }}
