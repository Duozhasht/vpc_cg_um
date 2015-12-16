package sample;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.image.PixelFormat;
import javafx.scene.image.WritableImage;
import javafx.scene.layout.StackPane;
import javafx.stage.Stage;

import org.opencv.core.*;
import org.opencv.imgcodecs.Imgcodecs;
import org.opencv.imgproc.*;

import java.nio.ByteBuffer;


public class Main extends Application {


    static{ System.loadLibrary(Core.NATIVE_LIBRARY_NAME); }

    @Override
    public void start(Stage primaryStage) throws Exception
    {
        // Parent root = FXMLLoader.load(getClass().getResource("sample.fxml"));

        primaryStage.setTitle("Hello World");

        Mat m = Imgcodecs.imread("FullSizeRender.jpg",Imgcodecs.CV_LOAD_IMAGE_COLOR);

        Imgproc.cvtColor(m, m, Imgproc.COLOR_BGR2RGB);

        System.out.println("OpenCV Mat format:\n" + m.channels());
        System.out.println("OpenCV Mat data:\n" + m.cols() + "x" + m.rows() + " " + m.width() + "x" +m.height() );

        int width = m.cols();
        int height = m.rows();

        int length = width * height * m.channels();

        byte[] bytes = new byte[ length ];

        m.get(0, 0, bytes);

        WritableImage image = new WritableImage(width, height);

        ByteBuffer byteBuff = ByteBuffer.wrap(bytes);

        PixelFormat<ByteBuffer> buffFormat = PixelFormat.getByteRgbInstance();

        image.getPixelWriter().setPixels(0, 0, width, height, buffFormat, byteBuff, width * m.channels());

        ImageView imageView = new ImageView();
        imageView.setImage(image);

        StackPane root = new StackPane();

        root.getChildren().add(imageView);

        Scene scene = new Scene(root, 300, 300);
        primaryStage.setScene(scene);
        primaryStage.show();



    }


    public static void main(String[] args) {
        launch(args);
    }

}
