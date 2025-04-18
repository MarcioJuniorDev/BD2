namespace BD_Consulta_17_04
{
    partial class Form1
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
            cmdCategoria = new Button();
            SuspendLayout();
            // 
            // cmdCategoria
            // 
            cmdCategoria.Location = new Point(322, 193);
            cmdCategoria.Name = "cmdCategoria";
            cmdCategoria.Size = new Size(139, 23);
            cmdCategoria.TabIndex = 0;
            cmdCategoria.Text = "Cadastro de Categoria";
            cmdCategoria.UseVisualStyleBackColor = true;
            cmdCategoria.Click += cmdCategoria_Click;
            // 
            // Form1
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(800, 450);
            Controls.Add(cmdCategoria);
            Name = "Form1";
            Text = "Form1";
            Load += Form1_Load;
            ResumeLayout(false);
        }

        #endregion

        private Button cmdCategoria;
    }
}