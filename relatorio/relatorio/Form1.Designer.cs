namespace relatorio
{
    partial class frmMapa
    {
        /// <summary>
        ///  Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        ///  Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        ///  Required method for Designer support - do not modify
        ///  the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            SuspendLayout();
            // 
            // frmMapa
            // 
            AutoScaleMode = AutoScaleMode.None;
            BackgroundImage = Properties.Resources.MAPA1;
            ClientSize = new Size(900, 600);
            FormBorderStyle = FormBorderStyle.None;
            Name = "frmMapa";
            Text = "Form1";
            TransparencyKey = Color.Lime;
            Load += frmMapa_Load;
            ResumeLayout(false);
        }

        #endregion
    }
}
